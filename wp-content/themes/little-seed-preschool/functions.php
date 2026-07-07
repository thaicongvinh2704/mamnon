<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once get_theme_file_path('app-shell.php');

define('LS_THEME_VERSION', '1.0.0');

function ls_theme_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/main.css');
    register_nav_menus([
        'primary' => __('Primary Menu', 'little-seed-preschool'),
        'footer' => __('Footer Menu', 'little-seed-preschool'),
    ]);
}
add_action('after_setup_theme', 'ls_theme_setup');

function ls_asset_version(string $relative_path): string {
    $path = get_theme_file_path($relative_path);
    if (!file_exists($path)) {
        return LS_THEME_VERSION;
    }

    $hash = hash_file('sha1', $path);
    if ($hash !== false) {
        return substr($hash, 0, 12);
    }

    return (string) filemtime($path);
}

function ls_theme_enqueue_assets(): void {
    $css_main = 'assets/css/main.css';
    $css_anim = 'assets/css/animations.css';
    $js_main = 'assets/js/main.js';

    wp_enqueue_style('ls-theme-main', get_theme_file_uri($css_main), [], ls_asset_version($css_main));
    wp_enqueue_style('ls-theme-animations', get_theme_file_uri($css_anim), ['ls-theme-main'], ls_asset_version($css_anim));
    wp_enqueue_script('ls-theme-main', get_theme_file_uri($js_main), [], ls_asset_version($js_main), true);

    wp_localize_script('ls-theme-main', 'lsTheme', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ls_lead_form'),
        'siteUrl' => home_url('/'),
        'themeUrl' => get_theme_file_uri('/'),
        'phone' => '028 7000 1122',
        'email' => 'admissions@littleseed.edu.vn',
    ]);
}
add_action('wp_enqueue_scripts', 'ls_theme_enqueue_assets');

function ls_theme_script_loader_tag(string $tag, string $handle, string $src): string {
    if ($handle === 'ls-theme-main') {
        return sprintf('<script type="module" src="%s" id="%s-js"></script>', esc_url($src), esc_attr($handle));
    }
    return $tag;
}
add_filter('script_loader_tag', 'ls_theme_script_loader_tag', 10, 3);

function ls_register_post_types(): void {
    register_post_type('ls_program', [
        'labels' => [
            'name' => 'Programs',
            'singular_name' => 'Program',
        ],
        'public' => true,
        'has_archive' => 'chuong-trinh',
        'rewrite' => ['slug' => 'chuong-trinh', 'with_front' => false],
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'],
        'show_in_rest' => true,
    ]);

    register_post_type('ls_campus', [
        'labels' => [
            'name' => 'Campuses',
            'singular_name' => 'Campus',
        ],
        'public' => true,
        'has_archive' => 'co-so',
        'rewrite' => ['slug' => 'co-so', 'with_front' => false],
        'menu_icon' => 'dashicons-location-alt',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'],
        'show_in_rest' => true,
    ]);

    register_post_type('ls_news', [
        'labels' => [
            'name' => 'News',
            'singular_name' => 'News',
        ],
        'public' => true,
        'has_archive' => 'tin-tuc',
        'rewrite' => ['slug' => 'tin-tuc', 'with_front' => false],
        'menu_icon' => 'dashicons-media-document',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions'],
        'taxonomies' => ['category'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'ls_register_post_types');

function ls_get_page_path_map(): array {
    return [
        'gioi-thieu' => 'Giới thiệu',
        'phuong-phap-montessori' => 'Phương pháp Montessori',
        'hoc-phi' => 'Học phí',
        'tuyen-sinh' => 'Tuyển sinh',
        'school-tour' => 'School Tour',
        'faq' => 'FAQ',
        'lien-he' => 'Liên hệ',
    ];
}

function ls_seed_demo_term(string $taxonomy, string $name, string $slug): int {
    $existing = term_exists($slug, $taxonomy);
    if (is_array($existing) && isset($existing['term_id'])) {
        return (int) $existing['term_id'];
    }
    if (is_int($existing)) {
        return $existing;
    }
    $result = wp_insert_term($name, $taxonomy, ['slug' => $slug]);
    if (is_wp_error($result)) {
        return 0;
    }
    return (int) $result['term_id'];
}

function ls_seed_demo_content(): void {
    if (get_option('ls_theme_seeded')) {
        return;
    }

    $pages = ls_get_page_path_map();
    foreach ($pages as $slug => $title) {
        $existing = get_page_by_path($slug, OBJECT, 'page');
        if (!$existing) {
            wp_insert_post([
                'post_type' => 'page',
                'post_status' => 'publish',
                'post_title' => $title,
                'post_name' => $slug,
                'post_content' => '',
            ]);
        }
    }

    $programs = [
        [
            'title' => 'Seedling Standard',
            'slug' => 'seedling-standard',
            'excerpt' => 'Nền tảng ấm áp cho trẻ 12 tháng đến 3 tuổi, nhấn mạnh tự lập và cảm xúc an toàn.',
            'content' => 'Seedling Standard kết hợp hoạt động thực hành, ngôn ngữ tự nhiên và nhịp sinh hoạt ổn định để trẻ dần tự tin khám phá.',
            'age' => '12 tháng - 3 tuổi',
        ],
        [
            'title' => 'Sprout Bilingual',
            'slug' => 'sprout-bilingual',
            'excerpt' => 'Môi trường song ngữ nhẹ nhàng cho trẻ 18 tháng đến 6 tuổi với tiếng Anh tự nhiên mỗi ngày.',
            'content' => 'Sprout Bilingual xây dựng thói quen nghe - nói tiếng Anh qua vòng tròn, trò chơi và hướng dẫn cá nhân hóa.',
            'age' => '18 tháng - 6 tuổi',
        ],
        [
            'title' => 'Bloom Discovery',
            'slug' => 'bloom-discovery',
            'excerpt' => 'Trẻ 3 đến 6 tuổi học qua dự án, nghệ thuật, khoa học nhỏ và vận động có chủ đích.',
            'content' => 'Bloom Discovery khơi dậy khả năng tự học, ghi nhớ và quan sát bằng trải nghiệm thực tế.',
            'age' => '3 - 6 tuổi',
        ],
        [
            'title' => 'Global Adventure',
            'slug' => 'global-adventure',
            'excerpt' => 'Chương trình 4 đến 6 tuổi tăng cường tiếng Anh, kỹ năng xã hội và tư duy mở rộng thế giới.',
            'content' => 'Global Adventure đưa trẻ đến với các chủ đề toàn cầu, dự án nhóm nhỏ và ngôn ngữ học thuật phù hợp lứa tuổi.',
            'age' => '4 - 6 tuổi',
        ],
    ];

    foreach ($programs as $program) {
        $existing = get_page_by_path($program['slug'], OBJECT, 'ls_program');
        if (!$existing) {
            $post_id = wp_insert_post([
                'post_type' => 'ls_program',
                'post_status' => 'publish',
                'post_title' => $program['title'],
                'post_name' => $program['slug'],
                'post_excerpt' => $program['excerpt'],
                'post_content' => $program['content'],
            ]);
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_ls_program_age', $program['age']);
            }
        }
    }

    $campuses = [
        [
            'title' => 'Little Seed Quận 2',
            'slug' => 'quan-2',
            'excerpt' => 'Khuôn viên yên tĩnh, gần công viên, phù hợp gia đình muốn môi trường học tập thoáng sáng.',
            'content' => 'Cơ sở Quận 2 có sân chơi mềm, thư viện mini và phòng thực hành cảm giác dành cho trẻ nhỏ.',
            'area' => 'Quận 2',
        ],
        [
            'title' => 'Little Seed Quận 7',
            'slug' => 'quan-7',
            'excerpt' => 'Cơ sở song ngữ năng động, thuận tiện cho phụ huynh khu Nam Sài Gòn.',
            'content' => 'Cơ sở Quận 7 nổi bật với lớp học mở, góc đọc sách và khu vận động trong nhà.',
            'area' => 'Quận 7',
        ],
        [
            'title' => 'Little Seed Bình Thạnh',
            'slug' => 'binh-thanh',
            'excerpt' => 'Không gian ấm cúng, kết nối chặt với gia đình và chương trình hỗ trợ cá nhân.',
            'content' => 'Cơ sở Bình Thạnh tập trung vào thói quen tự phục vụ, nghệ thuật và quan sát cảm xúc.',
            'area' => 'Bình Thạnh',
        ],
    ];

    foreach ($campuses as $campus) {
        $existing = get_page_by_path($campus['slug'], OBJECT, 'ls_campus');
        if (!$existing) {
            $post_id = wp_insert_post([
                'post_type' => 'ls_campus',
                'post_status' => 'publish',
                'post_title' => $campus['title'],
                'post_name' => $campus['slug'],
                'post_excerpt' => $campus['excerpt'],
                'post_content' => $campus['content'],
            ]);
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_ls_campus_area', $campus['area']);
            }
        }
    }

    $category_ids = [
        ls_seed_demo_term('category', 'Montessori', 'montessori'),
        ls_seed_demo_term('category', 'Song ngữ', 'song-ngu'),
        ls_seed_demo_term('category', 'Tuyển sinh', 'tuyen-sinh'),
    ];

    $posts = [
        [
            'title' => 'Vì sao trẻ mầm non cần học cách tự lập?',
            'slug' => 'vi-sao-tre-mam-non-can-hoc-cach-tu-lap',
            'excerpt' => 'Tự lập là nền móng để trẻ tự tin, biết chờ đợi và xử lý những việc nhỏ trong ngày học.',
            'content' => 'Bài viết gợi ý cách gia đình tạo cơ hội để trẻ tự mặc áo, tự cất đồ và tự nói nhu cầu của mình.',
            'categories' => [$category_ids[0]],
        ],
        [
            'title' => 'Cách giúp con yêu thích tiếng Anh tự nhiên',
            'slug' => 'cach-giup-con-yeu-thich-tieng-anh-tu-nhien',
            'excerpt' => 'Tiếng Anh hiệu quả nhất ở lứa mầm non thường đến từ trải nghiệm, lặp lại và cảm xúc tích cực.',
            'content' => 'Bài viết chia sẻ những hoạt động nhỏ có thể đưa tiếng Anh vào sinh hoạt hằng ngày một cách nhẹ nhàng.',
            'categories' => [$category_ids[1]],
        ],
        [
            'title' => 'Checklist chọn trường mầm non an toàn cho bé',
            'slug' => 'checklist-chon-truong-mam-non-an-toan-cho-be',
            'excerpt' => 'Một danh sách ngắn để phụ huynh quan sát lớp học, bữa ăn, quy trình đón trả và chăm sóc trẻ.',
            'content' => 'Bài viết tổng hợp các điểm cần kiểm tra trước khi đăng ký trường mầm non cho con.',
            'categories' => [$category_ids[2]],
        ],
    ];

    foreach ($posts as $post) {
        $existing = get_page_by_path($post['slug'], OBJECT, 'ls_news');
        if (!$existing) {
            $post_id = wp_insert_post([
                'post_type' => 'ls_news',
                'post_status' => 'publish',
                'post_title' => $post['title'],
                'post_name' => $post['slug'],
                'post_excerpt' => $post['excerpt'],
                'post_content' => $post['content'],
                'post_date' => gmdate('Y-m-d H:i:s', strtotime('-' . (30 + count($post['categories'])) . ' days')),
            ]);
            if ($post_id && !is_wp_error($post_id)) {
                if (!empty($post['categories'])) {
                    wp_set_post_terms($post_id, $post['categories'], 'category');
                }
            }
        }
    }

    update_option('ls_theme_seeded', 1, false);
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'ls_seed_demo_content');
add_action('init', function (): void {
    if (is_admin() && get_option('ls_theme_seeded')) {
        return;
    }
    if (get_option('ls_theme_seeded')) {
        return;
    }
    if (get_stylesheet() === 'little-seed-preschool') {
        ls_seed_demo_content();
    }
}, 20);

function ls_get_rate_limit_key(string $ip): string {
    return 'ls_rate_' . md5($ip);
}

function ls_handle_lead_form(): void {
    check_ajax_referer('ls_lead_form', 'ls_nonce');

    $ip = isset($_SERVER['REMOTE_ADDR']) ? (string) $_SERVER['REMOTE_ADDR'] : 'unknown';
    $rate_key = ls_get_rate_limit_key($ip);
    $rate_state = get_transient($rate_key);
    if (!is_array($rate_state)) {
        $rate_state = ['count' => 0, 'started' => time()];
    }

    if (($rate_state['count'] ?? 0) >= 8 && (time() - ($rate_state['started'] ?? time())) < 600) {
        wp_send_json_error(['message' => 'Bạn gửi quá nhanh, vui lòng thử lại sau ít phút.'], 429);
    }

    $honeypot = isset($_POST['company']) ? sanitize_text_field(wp_unslash($_POST['company'])) : '';
    if ($honeypot !== '') {
        wp_send_json_error(['message' => 'Yêu cầu không hợp lệ.'], 400);
    }

    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $age = isset($_POST['child_age']) ? sanitize_text_field(wp_unslash($_POST['child_age'])) : '';
    $campus = isset($_POST['campus']) ? sanitize_text_field(wp_unslash($_POST['campus'])) : '';
    $program = isset($_POST['program']) ? sanitize_text_field(wp_unslash($_POST['program'])) : '';
    $contact_method = isset($_POST['contact_method']) ? sanitize_text_field(wp_unslash($_POST['contact_method'])) : '';
    $note = isset($_POST['note']) ? sanitize_textarea_field(wp_unslash($_POST['note'])) : '';
    $form_type = isset($_POST['form_type']) ? sanitize_text_field(wp_unslash($_POST['form_type'])) : 'consultation';
    $brochure = !empty($_POST['brochure']) || $form_type === 'brochure';
    $newsletter = !empty($_POST['newsletter']);

    if ($name === '' || $phone === '' || $campus === '') {
        wp_send_json_error(['message' => 'Vui lòng điền đầy đủ họ tên, số điện thoại và cơ sở quan tâm.'], 422);
    }
    if ($email !== '' && !is_email($email)) {
        wp_send_json_error(['message' => 'Email chưa đúng định dạng.'], 422);
    }

    $submission = [
        'time' => current_time('mysql'),
        'ip' => $ip,
        'form_type' => $form_type,
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'age' => $age,
        'campus' => $campus,
        'program' => $program,
        'contact_method' => $contact_method,
        'note' => $note,
        'brochure' => $brochure,
        'newsletter' => $newsletter,
    ];

    $lead_store = get_option('ls_demo_leads', []);
    if (!is_array($lead_store)) {
        $lead_store = [];
    }
    array_unshift($lead_store, $submission);
    $lead_store = array_slice($lead_store, 0, 20);
    update_option('ls_demo_leads', $lead_store, false);

    $rate_state['count'] = (int) ($rate_state['count'] ?? 0) + 1;
    $rate_state['started'] = (int) ($rate_state['started'] ?? time());
    set_transient($rate_key, $rate_state, 10 * MINUTE_IN_SECONDS);

    wp_send_json_success([
        'message' => $brochure
            ? 'Cảm ơn bạn! Brochure demo sẽ được gửi trong thông báo xác nhận tiếp theo.'
            : 'Cảm ơn bạn! Little Seed đã nhận thông tin và sẽ liên hệ sớm.',
    ]);
}
add_action('wp_ajax_ls_submit_lead_form', 'ls_handle_lead_form');
add_action('wp_ajax_nopriv_ls_submit_lead_form', 'ls_handle_lead_form');

function ls_get_seo_context(): array {
    $home_title = 'Little Seed Montessori Preschool | Nuôi dưỡng tự lập - Khơi mở tương lai';
    $home_description = 'Little Seed Montessori Preschool là trường mầm non song ngữ theo cảm hứng Montessori, tập trung tự lập, cảm xúc, tiếng Anh tự nhiên và chăm sóc toàn diện.';
    $context = [
        'title' => $home_title,
        'description' => $home_description,
        'canonical' => home_url('/'),
        'type' => 'website',
        'image' => ls_get_image_url('homepage-hero-preschool-school-tour.webp'),
        'schema' => ls_get_organization_schema(),
    ];

    if (is_front_page()) {
        return $context;
    }

    if (is_page()) {
        $slug = get_post_field('post_name', get_queried_object_id());
        $map = ls_get_page_seo_map();
        if (isset($map[$slug])) {
            return $map[$slug];
        }
    }

    if (is_post_type_archive('ls_program')) {
        return [
            'title' => 'Chương trình học | Little Seed Montessori Preschool',
            'description' => 'Khám phá 4 chương trình học Little Seed được thiết kế theo độ tuổi, từ nền tảng tự lập đến song ngữ và dự án khám phá.',
            'canonical' => get_post_type_archive_link('ls_program'),
            'type' => 'website',
            'image' => ls_get_image_url('homepage-program-tabs-children.webp'),
            'schema' => ls_get_organization_schema(),
        ];
    }

    if (is_post_type_archive('ls_campus')) {
        return [
            'title' => 'Cơ sở Little Seed | Little Seed Montessori Preschool',
            'description' => 'Xem danh sách 3 cơ sở Little Seed với thông tin tham quan, hotline và khu vực phục vụ phù hợp từng gia đình.',
            'canonical' => get_post_type_archive_link('ls_campus'),
            'type' => 'website',
            'image' => ls_get_image_url('branches-campus-card-visual.webp'),
            'schema' => ls_get_organization_schema(),
        ];
    }

    if (is_post_type_archive('ls_news')) {
        return [
            'title' => 'Tin tức | Little Seed Montessori Preschool',
            'description' => 'Bài viết, checklist và chia sẻ về Montessori, tiếng Anh tự nhiên và hành trình chọn trường mầm non an toàn.',
            'canonical' => get_post_type_archive_link('ls_news'),
            'type' => 'website',
            'image' => ls_get_image_url('blog-montessori-independence-thumbnail.webp'),
            'schema' => ls_get_organization_schema(),
        ];
    }

    if (is_singular('ls_program')) {
        $post_id = get_queried_object_id();
        $title = get_the_title($post_id);
        $slug = get_post_field('post_name', $post_id);
        $map = ls_get_program_page_map();
        $data = $map[$slug] ?? [];
        return [
            'title' => $title . ' | Chương trình học | Little Seed',
            'description' => $data['excerpt'] ?? wp_strip_all_tags(get_the_excerpt($post_id)),
            'canonical' => get_permalink($post_id),
            'type' => 'article',
            'image' => ls_get_image_url($data['image'] ?? 'homepage-program-tabs-children.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Chương trình', 'url' => get_post_type_archive_link('ls_program')],
                ['name' => $title, 'url' => get_permalink($post_id)],
            ]),
        ];
    }

    if (is_singular('ls_campus')) {
        $post_id = get_queried_object_id();
        $title = get_the_title($post_id);
        $slug = get_post_field('post_name', $post_id);
        $map = ls_get_campus_page_map();
        $data = $map[$slug] ?? [];
        return [
            'title' => $title . ' | Cơ sở | Little Seed',
            'description' => $data['excerpt'] ?? wp_strip_all_tags(get_the_excerpt($post_id)),
            'canonical' => get_permalink($post_id),
            'type' => 'article',
            'image' => ls_get_image_url($data['image'] ?? 'branches-campus-card-visual.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Cơ sở', 'url' => get_post_type_archive_link('ls_campus')],
                ['name' => $title, 'url' => get_permalink($post_id)],
            ]),
        ];
    }

    if (is_singular('ls_news')) {
        $post_id = get_queried_object_id();
        $title = get_the_title($post_id);
        $excerpt = get_the_excerpt($post_id);
        return [
            'title' => $title . ' | Tin tức | Little Seed',
            'description' => $excerpt ?: 'Bài viết chia sẻ chuyên môn và kinh nghiệm chọn trường mầm non.',
            'canonical' => get_permalink($post_id),
            'type' => 'article',
            'image' => get_the_post_thumbnail_url($post_id, 'full') ?: ls_get_image_url('blog-montessori-independence-thumbnail.webp'),
            'schema' => ls_get_article_schema($post_id),
        ];
    }

    return $context;
}

function ls_get_page_seo_map(): array {
    return [
        'gioi-thieu' => [
            'title' => 'Giới thiệu | Little Seed Montessori Preschool',
            'description' => 'Khám phá câu chuyện thương hiệu, tầm nhìn, sứ mệnh, giá trị và đội ngũ giáo viên của Little Seed.',
            'canonical' => home_url('/gioi-thieu/'),
            'type' => 'article',
            'image' => ls_get_image_url('homepage-about-montessori-classroom.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Giới thiệu', 'url' => home_url('/gioi-thieu/')],
            ]),
        ],
        'phuong-phap-montessori' => [
            'title' => 'Phương pháp Montessori | Little Seed',
            'description' => 'Montessori-inspired learning tại Little Seed: tự lập, quan sát, học qua trải nghiệm và phát triển toàn diện.',
            'canonical' => home_url('/phuong-phap-montessori/'),
            'type' => 'article',
            'image' => ls_get_image_url('curriculum-montessori-materials-closeup.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Phương pháp Montessori', 'url' => home_url('/phuong-phap-montessori/')],
            ]),
        ],
        'hoc-phi' => [
            'title' => 'Học phí | Little Seed Montessori Preschool',
            'description' => 'Bảng học phí tham khảo demo, lưu ý học phí thay đổi theo cơ sở và chương trình học.',
            'canonical' => home_url('/hoc-phi/'),
            'type' => 'article',
            'image' => ls_get_image_url('tuition-consultation-parent-meeting.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Học phí', 'url' => home_url('/hoc-phi/')],
            ]),
        ],
        'tuyen-sinh' => [
            'title' => 'Tuyển sinh | Little Seed Montessori Preschool',
            'description' => 'Quy trình tuyển sinh 4 bước rõ ràng: để lại thông tin, tư vấn, tham quan trường và hoàn tất hồ sơ nhập học.',
            'canonical' => home_url('/tuyen-sinh/'),
            'type' => 'article',
            'image' => ls_get_image_url('admissions-school-tour-family.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Tuyển sinh', 'url' => home_url('/tuyen-sinh/')],
            ]),
        ],
        'school-tour' => [
            'title' => 'School Tour | Little Seed Montessori Preschool',
            'description' => 'Đăng ký tham quan trường Little Seed để trải nghiệm lớp học, trao đổi với đội ngũ tư vấn và nhận lộ trình nhập học.',
            'canonical' => home_url('/school-tour/'),
            'type' => 'article',
            'image' => ls_get_image_url('admissions-school-tour-family.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'School Tour', 'url' => home_url('/school-tour/')],
            ]),
        ],
        'faq' => [
            'title' => 'FAQ | Little Seed Montessori Preschool',
            'description' => 'Giải đáp nhanh về tuyển sinh, học phí, dinh dưỡng, chương trình học và chăm sóc an toàn tại Little Seed.',
            'canonical' => home_url('/faq/'),
            'type' => 'article',
            'image' => ls_get_image_url('faq-parent-support-meeting.webp'),
            'schema' => ls_get_faq_schema(ls_get_faq_groups()),
        ],
        'lien-he' => [
            'title' => 'Liên hệ | Little Seed Montessori Preschool',
            'description' => 'Liên hệ Little Seed qua hotline, email, form tư vấn hoặc đăng ký tham quan trường.',
            'canonical' => home_url('/lien-he/'),
            'type' => 'article',
            'image' => ls_get_image_url('contact-support-hotline-visual.webp'),
            'schema' => ls_get_breadcrumb_schema([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Liên hệ', 'url' => home_url('/lien-he/')],
            ]),
        ],
    ];
}

function ls_get_organization_schema(): array {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Preschool',
        'name' => 'Little Seed Montessori Preschool',
        'url' => home_url('/'),
        'telephone' => '028 7000 1122',
        'email' => 'admissions@littleseed.edu.vn',
        'areaServed' => 'Ho Chi Minh City',
    ];
}

function ls_get_breadcrumb_schema(array $items): array {
    $list = [];
    foreach ($items as $index => $item) {
        $list[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $item['url'],
        ];
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $list,
    ];
}

function ls_get_article_schema(int $post_id): array {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'headline' => get_the_title($post_id),
        'description' => wp_strip_all_tags(get_the_excerpt($post_id)),
        'image' => get_the_post_thumbnail_url($post_id, 'full') ?: ls_get_image_url('blog-montessori-independence-thumbnail.webp'),
        'author' => [
            '@type' => 'Organization',
            'name' => 'Little Seed Montessori Preschool',
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'Little Seed Montessori Preschool',
        ],
        'mainEntityOfPage' => get_permalink($post_id),
    ];
}

function ls_get_faq_schema(array $groups): array {
    $main = [];
    foreach ($groups as $group) {
        foreach ($group['items'] as $item) {
            $main[] = [
                '@type' => 'Question',
                'name' => $item['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $item['answer'],
                ],
            ];
        }
    }
    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $main,
    ];
}

function ls_get_route_name(): string {
    if (is_front_page()) {
        return 'home';
    }
    if (is_page()) {
        $slug = get_post_field('post_name', get_queried_object_id());
        return $slug ?: 'page';
    }
    if (is_post_type_archive('ls_program')) {
        return 'programs';
    }
    if (is_singular('ls_program')) {
        return 'program-detail';
    }
    if (is_post_type_archive('ls_campus')) {
        return 'campuses';
    }
    if (is_singular('ls_campus')) {
        return 'campus-detail';
    }
    if (is_post_type_archive('ls_news')) {
        return 'blog';
    }
    if (is_singular('ls_news')) {
        return 'blog-detail';
    }
    if (is_404()) {
        return '404';
    }
    return 'archive';
}

function ls_theme_body_class(array $classes): array {
    $classes[] = 'ls-theme';
    $classes[] = 'ls-route-' . sanitize_html_class(ls_get_route_name());
    return $classes;
}
add_filter('body_class', 'ls_theme_body_class');

function ls_theme_document_title(string $title): string {
    $seo = ls_get_seo_context();
    if (!empty($seo['title'])) {
        return $seo['title'];
    }
    return $title;
}
add_filter('pre_get_document_title', 'ls_theme_document_title', 20);

function ls_print_head_meta(): void {
    $seo = ls_get_seo_context();
    echo "\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
    if (!empty($seo['description'])) {
        echo '<meta name="description" content="' . esc_attr($seo['description']) . '">' . "\n";
    }
    echo '<meta property="og:title" content="' . esc_attr($seo['title'] ?? get_bloginfo('name')) . '">' . "\n";
    if (!empty($seo['description'])) {
        echo '<meta property="og:description" content="' . esc_attr($seo['description']) . '">' . "\n";
    }
    echo '<meta property="og:type" content="' . esc_attr($seo['type'] ?? 'website') . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($seo['canonical'] ?? home_url('/')) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($seo['image'] ?? ls_get_image_url('homepage-hero-preschool-school-tour.webp')) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($seo['canonical'] ?? home_url('/')) . '">' . "\n";

    if (is_front_page()) {
        $hero = ls_get_image_spec('homepage-hero-preschool-school-tour.webp');
        if ($hero) {
            echo '<link rel="preload" as="image" href="' . esc_url($hero['src']) . '" imagesizes="100vw">' . "\n";
        }
    }

    if (!empty($seo['schema']) && is_array($seo['schema'])) {
        echo '<script type="application/ld+json">' . wp_json_encode($seo['schema'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}
add_action('wp_head', 'ls_print_head_meta', 1);
