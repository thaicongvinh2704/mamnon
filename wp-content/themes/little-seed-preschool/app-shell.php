<?php
if (!defined('ABSPATH')) {
    exit;
}

function ls_get_image_specs(): array {
    return [
        'little-seed-logo-mark.svg' => [
            'alt' => 'Little Seed Montessori Preschool logo',
            'width' => 64,
            'height' => 64,
        ],
        'homepage-hero-preschool-school-tour.webp' => [
            'alt' => 'Little Seed preschool children on a school tour',
            'width' => 1920,
            'height' => 900,
            'isHero' => true,
        ],
        'homepage-about-montessori-classroom.webp' => [
            'alt' => 'Montessori-inspired classroom at Little Seed',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-active-learning-highscope.webp' => [
            'alt' => 'Children engaged in active learning with hands-on materials',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-english-circle-time.webp' => [
            'alt' => 'Teacher leading natural English circle time',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-care-nutrition-mealtime.webp' => [
            'alt' => 'Healthy mealtime and nutrition care',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-teacher-child-guidance.webp' => [
            'alt' => 'Teacher guiding a child with patience',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-program-tabs-children.webp' => [
            'alt' => 'Children exploring different learning stations',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-campus-playground.webp' => [
            'alt' => 'Playground at Little Seed campus',
            'width' => 1600,
            'height' => 900,
        ],
        'homepage-consultation-form-visual.webp' => [
            'alt' => 'Parent meeting with admissions consultant',
            'width' => 1200,
            'height' => 800,
        ],
        'homepage-parent-testimonial-conversation.webp' => [
            'alt' => 'Parent sharing feedback in conversation',
            'width' => 1200,
            'height' => 800,
        ],
        'program-toddler-standard-classroom.webp' => [
            'alt' => 'Toddler classroom with practical life materials',
            'width' => 1200,
            'height' => 800,
        ],
        'program-bilingual-explore-class.webp' => [
            'alt' => 'Bilingual exploration class',
            'width' => 1200,
            'height' => 800,
        ],
        'program-discover-project-learning.webp' => [
            'alt' => 'Project-based discovery learning',
            'width' => 1200,
            'height' => 800,
        ],
        'program-adventure-international-english.webp' => [
            'alt' => 'International English adventure class',
            'width' => 1200,
            'height' => 800,
        ],
        'curriculum-montessori-materials-closeup.webp' => [
            'alt' => 'Close-up of Montessori materials',
            'width' => 1200,
            'height' => 800,
        ],
        'curriculum-art-music-room.webp' => [
            'alt' => 'Art and music room',
            'width' => 1200,
            'height' => 800,
        ],
        'curriculum-water-play-safety.webp' => [
            'alt' => 'Water play learning with safety supervision',
            'width' => 1200,
            'height' => 800,
        ],
        'nutrition-school-kitchen-healthy-meal.webp' => [
            'alt' => 'Healthy meal prepared in school kitchen',
            'width' => 1200,
            'height' => 800,
        ],
        'campus-library-reading-corner.webp' => [
            'alt' => 'Reading corner in campus library',
            'width' => 1200,
            'height' => 800,
        ],
        'campus-sensory-play-area.webp' => [
            'alt' => 'Sensory play area for children',
            'width' => 1200,
            'height' => 800,
        ],
        'trust-teachers-team-group.webp' => [
            'alt' => 'Little Seed teaching team',
            'width' => 1200,
            'height' => 800,
        ],
        'trust-teacher-training-workshop.webp' => [
            'alt' => 'Teacher training workshop',
            'width' => 1200,
            'height' => 800,
        ],
        'admissions-school-tour-family.webp' => [
            'alt' => 'Family attending school tour',
            'width' => 1200,
            'height' => 800,
        ],
        'branches-campus-card-visual.webp' => [
            'alt' => 'Campus card visual with greenery',
            'width' => 1200,
            'height' => 800,
        ],
        'tuition-consultation-parent-meeting.webp' => [
            'alt' => 'Tuition consultation with a parent',
            'width' => 1200,
            'height' => 800,
        ],
        'faq-parent-support-meeting.webp' => [
            'alt' => 'Parent support meeting and Q&A',
            'width' => 1200,
            'height' => 800,
        ],
        'blog-montessori-independence-thumbnail.webp' => [
            'alt' => 'Blog on Montessori independence',
            'width' => 1200,
            'height' => 675,
        ],
        'blog-child-language-development-thumbnail.webp' => [
            'alt' => 'Blog on child language development',
            'width' => 1200,
            'height' => 675,
        ],
        'student-portrait-confident-child.webp' => [
            'alt' => 'Confident preschool child portrait',
            'width' => 1200,
            'height' => 800,
        ],
        'contact-support-hotline-visual.webp' => [
            'alt' => 'Admissions hotline support visual',
            'width' => 1200,
            'height' => 800,
        ],
    ];
}

function ls_get_image_spec(string $filename): ?array {
    $specs = ls_get_image_specs();
    if (!isset($specs[$filename])) {
        return null;
    }
    $spec = $specs[$filename];
    $src = get_theme_file_uri('assets/images/' . $filename);
    $path = get_theme_file_path('assets/images/' . $filename);
    $exists = file_exists($path);
    $spec['src'] = $exists ? $src : ls_placeholder_image_url($spec['width'], $spec['height'], $spec['alt']);
    $spec['loading'] = !empty($spec['isHero']) ? 'eager' : 'lazy';
    $spec['decoding'] = 'async';
    $spec['isHero'] = !empty($spec['isHero']);
    $spec['filename'] = $filename;
    return $spec;
}

function ls_get_image_url(string $filename): string {
    $spec = ls_get_image_spec($filename);
    return $spec['src'] ?? ls_placeholder_image_url(1200, 800, 'Little Seed image placeholder');
}

function ls_placeholder_image_url(int $width, int $height, string $label): string {
    $svg = sprintf(
        '<svg xmlns="http://www.w3.org/2000/svg" width="%1$d" height="%2$d" viewBox="0 0 %1$d %2$d" role="img" aria-label="%3$s"><defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="1"><stop offset="0%%" stop-color="%4$s"/><stop offset="100%%" stop-color="%5$s"/></linearGradient></defs><rect width="100%%" height="100%%" rx="32" fill="url(#g)"/><text x="50%%" y="50%%" dominant-baseline="middle" text-anchor="middle" fill="%6$s" font-family="Arial, sans-serif" font-size="%7$d" font-weight="700">%8$s</text></svg>',
        $width,
        $height,
        esc_attr($label),
        '#f6f0df',
        '#dbead5',
        '#49604f',
        max(22, (int) round(min($width, $height) * 0.055)),
        esc_html__('Little Seed', 'little-seed-preschool')
    );
    return 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
}

function ls_render_image(string $filename, array $attrs = []): string {
    $spec = ls_get_image_spec($filename);
    if (!$spec) {
        $spec = [
            'src' => ls_placeholder_image_url(1200, 800, 'Little Seed'),
            'alt' => 'Little Seed image placeholder',
            'width' => 1200,
            'height' => 800,
            'loading' => 'lazy',
            'decoding' => 'async',
            'isHero' => false,
        ];
    }

    $attributes = array_merge([
        'src' => $spec['src'],
        'alt' => $spec['alt'],
        'width' => $spec['width'],
        'height' => $spec['height'],
        'loading' => $spec['loading'],
        'decoding' => $spec['decoding'],
    ], $attrs);

    if (!empty($spec['isHero']) && empty($attrs['loading'])) {
        $attributes['loading'] = 'eager';
    }

    $html = '<img';
    foreach ($attributes as $key => $value) {
        $html .= ' ' . $key . '="' . esc_attr((string) $value) . '"';
    }
    $html .= '>';
    return $html;
}

function ls_get_navigation_data(): array {
    return [
        [
            'label' => 'Giới thiệu',
            'href' => home_url('/gioi-thieu/'),
            'children' => [
                ['label' => 'Câu chuyện Little Seed', 'href' => home_url('/gioi-thieu/#story')],
                ['label' => 'Tầm nhìn & giá trị', 'href' => home_url('/gioi-thieu/#vision')],
                ['label' => 'Đội ngũ giáo viên', 'href' => home_url('/gioi-thieu/#team')],
                ['label' => 'Dinh dưỡng & chăm sóc', 'href' => home_url('/gioi-thieu/#care')],
            ],
        ],
        [
            'label' => 'Phương pháp giáo dục',
            'href' => home_url('/phuong-phap-montessori/'),
            'children' => [
                ['label' => 'Montessori', 'href' => home_url('/phuong-phap-montessori/#montessori')],
                ['label' => 'Học tập chủ động', 'href' => home_url('/phuong-phap-montessori/#active-learning')],
                ['label' => 'Tiếng Anh tự nhiên', 'href' => home_url('/phuong-phap-montessori/#english')],
                ['label' => 'Kỹ năng cảm xúc xã hội', 'href' => home_url('/phuong-phap-montessori/#social-emotional')],
            ],
        ],
        [
            'label' => 'Chương trình học',
            'href' => home_url('/chuong-trinh/'),
            'children' => [
                ['label' => 'Seedling Standard', 'href' => home_url('/chuong-trinh/seedling-standard/')],
                ['label' => 'Sprout Bilingual', 'href' => home_url('/chuong-trinh/sprout-bilingual/')],
                ['label' => 'Bloom Discovery', 'href' => home_url('/chuong-trinh/bloom-discovery/')],
                ['label' => 'Global Adventure', 'href' => home_url('/chuong-trinh/global-adventure/')],
            ],
        ],
        [
            'label' => 'Tuyển sinh',
            'href' => home_url('/tuyen-sinh/'),
            'children' => [
                ['label' => 'Quy trình tuyển sinh', 'href' => home_url('/tuyen-sinh/#process')],
                ['label' => 'Đăng ký school tour', 'href' => home_url('/school-tour/')],
                ['label' => 'Học phí', 'href' => home_url('/hoc-phi/')],
                ['label' => 'FAQ', 'href' => home_url('/faq/')],
            ],
        ],
        [
            'label' => 'Cơ sở',
            'href' => home_url('/co-so/'),
            'children' => [
                ['label' => 'Little Seed Quận 2', 'href' => home_url('/co-so/quan-2/')],
                ['label' => 'Little Seed Quận 7', 'href' => home_url('/co-so/quan-7/')],
                ['label' => 'Little Seed Bình Thạnh', 'href' => home_url('/co-so/binh-thanh/')],
            ],
        ],
        [
            'label' => 'Tin tức',
            'href' => home_url('/tin-tuc/'),
            'children' => [],
        ],
        [
            'label' => 'Liên hệ',
            'href' => home_url('/lien-he/'),
            'children' => [],
        ],
    ];
}

function ls_get_program_page_map(): array {
    return [
        'seedling-standard' => [
            'title' => 'Seedling Standard',
            'age' => '12 tháng - 3 tuổi',
            'excerpt' => 'Nền tảng ấm áp cho trẻ 12 tháng đến 3 tuổi, nhấn mạnh tự lập, cảm xúc an toàn và thói quen tích cực.',
            'image' => 'program-toddler-standard-classroom.webp',
            'goal' => 'Xây dựng cảm giác an toàn, tự lập và thói quen sinh hoạt ổn định.',
            'day' => [
                'Đón trẻ và kết nối cảm xúc buổi sáng',
                'Practical life: tự phục vụ và phối hợp tay mắt',
                'Nghe nhạc, vận động nhẹ, đọc sách',
                'Bữa ăn, ngủ trưa và chuyển tiếp mượt mà',
            ],
            'highlights' => [
                'Môi trường chuẩn bị theo nhu cầu lứa tuổi',
                'Nhịp sinh hoạt đều đặn, nhẹ nhàng',
                'Giáo viên quan sát sát sao từng trẻ',
                'Kết nối gia đình qua nhật ký học tập',
            ],
            'faq' => [
                ['question' => 'Chương trình này phù hợp cho bé nào?', 'answer' => 'Dành cho trẻ từ 12 tháng đến 3 tuổi, đặc biệt là bé đang bắt đầu đi lớp hoặc cần làm quen nhịp sinh hoạt tập thể.'],
                ['question' => 'Có học tiếng Anh không?', 'answer' => 'Trẻ được nghe tiếng Anh tự nhiên qua bài hát, từ vựng quen thuộc và hoạt động hằng ngày.'],
            ],
        ],
        'sprout-bilingual' => [
            'title' => 'Sprout Bilingual',
            'age' => '18 tháng - 6 tuổi',
            'excerpt' => 'Chương trình song ngữ nhẹ nhàng giúp trẻ làm quen tiếng Anh tự nhiên mỗi ngày, qua trải nghiệm, trò chơi và tương tác thật.',
            'image' => 'program-bilingual-explore-class.webp',
            'goal' => 'Phát triển ngôn ngữ đôi và khả năng tự tin giao tiếp trong môi trường ấm áp.',
            'day' => [
                'Circle time song ngữ',
                'Hoạt động học thuật vừa sức',
                'Trạm ngôn ngữ, vận động, nghệ thuật',
                'Story time và phản hồi cảm xúc',
            ],
            'highlights' => [
                'Tiếp xúc tiếng Anh tự nhiên hằng ngày',
                'Giáo viên đồng hành từng nhóm nhỏ',
                'Bài học gắn với vật thật và hành động',
                'Tiến độ theo từng giai đoạn phát triển',
            ],
            'faq' => [
                ['question' => 'Bé chưa biết tiếng Anh có theo được không?', 'answer' => 'Hoàn toàn được. Chương trình bắt đầu từ ngôn ngữ quen thuộc, nhiều lặp lại và phản xạ tự nhiên.'],
                ['question' => 'Có cần học thêm bên ngoài?', 'answer' => 'Không bắt buộc. Chương trình đã tích hợp tiếng Anh trong sinh hoạt hằng ngày.'],
            ],
        ],
        'bloom-discovery' => [
            'title' => 'Bloom Discovery',
            'age' => '3 - 6 tuổi',
            'excerpt' => 'Trẻ 3 đến 6 tuổi học qua dự án, khám phá khoa học, nghệ thuật và kỹ năng tự học có chủ đích.',
            'image' => 'program-discover-project-learning.webp',
            'goal' => 'Khơi dậy tư duy khám phá, tinh thần hợp tác và khả năng hoàn thành nhiệm vụ.',
            'day' => [
                'Bài học Montessori',
                'Dự án khoa học - nghệ thuật',
                'Tiếng Anh qua chủ đề',
                'Vận động và thực hành cảm xúc xã hội',
            ],
            'highlights' => [
                'Tăng cường học qua dự án',
                'Rèn kỹ năng quan sát, đặt câu hỏi',
                'Tạo thói quen làm việc độc lập',
                'Báo cáo tiến độ học tập định kỳ',
            ],
            'faq' => [
                ['question' => 'Chương trình này có nặng học thuật không?', 'answer' => 'Chương trình cân bằng giữa học thuật phù hợp lứa tuổi và trải nghiệm vận động, nghệ thuật, cảm xúc.'],
                ['question' => 'Bé có thể chuyển từ lớp khác sang không?', 'answer' => 'Có. Đội ngũ sẽ đánh giá độ thích nghi và đề xuất lộ trình phù hợp.'],
            ],
        ],
        'global-adventure' => [
            'title' => 'Global Adventure',
            'age' => '4 - 6 tuổi',
            'excerpt' => 'Chương trình tăng cường tiếng Anh, tư duy mở rộng và khám phá thế giới qua chủ đề toàn cầu.',
            'image' => 'program-adventure-international-english.webp',
            'goal' => 'Giúp trẻ sẵn sàng cho bậc tiểu học với kỹ năng giao tiếp và tư duy quốc tế.',
            'day' => [
                'English immersion moments',
                'Project-based learning',
                'Câu lạc bộ đọc, kể chuyện và thuyết trình',
                'STEM mini-labs và hợp tác nhóm',
            ],
            'highlights' => [
                'Tiếng Anh sử dụng trong nhiều ngữ cảnh',
                'Mở rộng từ vựng theo chủ đề toàn cầu',
                'Khuyến khích thuyết trình và phản biện nhẹ',
                'Lộ trình chuẩn bị vào lớp 1 có định hướng',
            ],
            'faq' => [
                ['question' => 'Chương trình có phù hợp chuẩn bị vào lớp 1 không?', 'answer' => 'Có. Chương trình giúp trẻ hoàn thiện nền tảng ngôn ngữ, tư duy và tự lập trước khi vào tiểu học.'],
                ['question' => 'Có cần kỹ năng tiếng Anh tốt từ trước không?', 'answer' => 'Không cần. Trẻ sẽ được hỗ trợ theo mức độ hiện tại và tiến bộ dần qua trải nghiệm.'],
            ],
        ],
    ];
}

function ls_get_campus_page_map(): array {
    return [
        'quan-2' => [
            'title' => 'Little Seed Quận 2',
            'region' => 'Quận 2',
            'address' => '18 Đường Số 12, Phường An Phú, TP. Thủ Đức',
            'hotline' => '028 7000 1122 ext. 201',
            'hours' => '08:00 - 17:30, Thứ 2 - Thứ 7',
            'image' => 'branches-campus-card-visual.webp',
            'gallery' => [
                'campus-library-reading-corner.webp',
                'campus-sensory-play-area.webp',
                'homepage-campus-playground.webp',
            ],
            'features' => [
                'Sân chơi ngoài trời nhiều ánh sáng',
                'Thư viện mini và góc đọc yên tĩnh',
                'Phòng học rộng, tối ưu quan sát',
                'Gần khu dân cư, thuận tiện tham quan',
            ],
        ],
        'quan-7' => [
            'title' => 'Little Seed Quận 7',
            'region' => 'Quận 7',
            'address' => '102 Nguyễn Lương Bằng, Phường Tân Phú, Quận 7',
            'hotline' => '028 7000 1122 ext. 202',
            'hours' => '08:00 - 17:30, Thứ 2 - Thứ 7',
            'image' => 'branches-campus-card-visual.webp',
            'gallery' => [
                'homepage-campus-playground.webp',
                'campus-library-reading-corner.webp',
                'campus-sensory-play-area.webp',
            ],
            'features' => [
                'Không gian song ngữ sinh động',
                'Khu hoạt động trong nhà linh hoạt',
                'Góc trải nghiệm cảm giác và nghệ thuật',
                'Phụ huynh dễ di chuyển, đón trả thuận tiện',
            ],
        ],
        'binh-thanh' => [
            'title' => 'Little Seed Bình Thạnh',
            'region' => 'Bình Thạnh',
            'address' => '56 Võ Oanh, Phường 25, Bình Thạnh',
            'hotline' => '028 7000 1122 ext. 203',
            'hours' => '08:00 - 17:30, Thứ 2 - Thứ 7',
            'image' => 'branches-campus-card-visual.webp',
            'gallery' => [
                'campus-sensory-play-area.webp',
                'homepage-campus-playground.webp',
                'campus-library-reading-corner.webp',
            ],
            'features' => [
                'Môi trường ấm áp, hỗ trợ thích nghi',
                'Lớp học gần gũi, nhiều góc tự học',
                'Đội ngũ trao đổi chặt với phụ huynh',
                'Lịch school tour linh hoạt theo nhu cầu',
            ],
        ],
    ];
}

function ls_get_why_choose_items(): array {
    return [
        [
            'icon' => 'leaf',
            'title' => 'Montessori-inspired learning',
            'description' => 'Khung học tập khuyến khích trẻ tự chọn, tự làm và tự hoàn thành nhiệm vụ vừa sức.',
        ],
        [
            'icon' => 'language',
            'title' => 'Tiếng Anh tự nhiên mỗi ngày',
            'description' => 'Tiếng Anh đi cùng sinh hoạt, trò chuyện và vòng tròn, giúp con nghe trước rồi nói sau.',
        ],
        [
            'icon' => 'heart',
            'title' => 'Chăm sóc & dinh dưỡng toàn diện',
            'description' => 'Bữa ăn, giấc ngủ và thói quen vệ sinh được tổ chức nhịp nhàng, an toàn và rõ ràng.',
        ],
        [
            'icon' => 'teacher',
            'title' => 'Giáo viên tận tâm, quan sát từng trẻ',
            'description' => 'Mỗi lớp có đội ngũ theo sát tiến trình, phản hồi cho gia đình và điều chỉnh phù hợp.',
        ],
    ];
}

function ls_get_home_slides(): array {
    return [
        [
            'eyebrow' => 'Little Seed Montessori Preschool',
            'title' => 'Môi trường mầm non giúp con tự lập, hạnh phúc và tự tin',
            'text' => 'Nhịp sinh hoạt ấm áp, lớp học chuẩn bị kỹ và giáo viên quan sát sát sao giúp trẻ an tâm lớn lên mỗi ngày.',
            'image' => 'homepage-hero-preschool-school-tour.webp',
            'cta' => 'Đăng ký tham quan trường',
            'secondary' => 'Nhận học phí',
            'secondary_href' => home_url('/hoc-phi/'),
            'secondary_icon' => 'calendar',
        ],
        [
            'eyebrow' => 'Bilingual by nature',
            'title' => 'Khơi mở tiếng Anh tự nhiên qua trải nghiệm mỗi ngày',
            'text' => 'Tiếng Anh được đưa vào vòng tròn, góc học tập và những khoảnh khắc đời thường để trẻ hấp thu tự nhiên.',
            'image' => 'homepage-english-circle-time.webp',
            'cta' => 'Đăng ký tham quan trường',
            'secondary' => 'Xem chương trình học',
            'secondary_href' => home_url('/chuong-trinh/'),
            'secondary_icon' => 'arrow',
        ],
        [
            'eyebrow' => 'School tour experience',
            'title' => 'Đăng ký school tour để cảm nhận lớp học Little Seed',
            'text' => 'Một buổi ghé thăm ngắn giúp ba mẹ thấy rõ không gian, nhịp lớp và cách Little Seed đồng hành cùng con.',
            'image' => 'admissions-school-tour-family.webp',
            'cta' => 'Đăng ký tham quan trường',
            'secondary' => 'Gọi tư vấn',
            'secondary_href' => 'tel:02870001122',
            'secondary_icon' => 'phone',
        ],
    ];
}

function ls_get_testimonials_data(): array {
    return [
        'parent' => [
            [
                'name' => 'Chị Hằng',
                'role' => 'Phụ huynh bé Mia, 4 tuổi',
                'quote' => 'Điều mình thích nhất là con biết tự chuẩn bị đồ dùng và hào hứng kể lại hoạt động ở lớp. Bé tự tin hơn nhiều.',
                'avatar' => 'student-portrait-confident-child.webp',
            ],
            [
                'name' => 'Anh Nam',
                'role' => 'Phụ huynh bé Leo, 3 tuổi',
                'quote' => 'Trường phản hồi rất rõ ràng, từng bữa ăn và giấc ngủ đều được cập nhật. Gia đình mình thấy yên tâm.',
                'avatar' => 'homepage-parent-testimonial-conversation.webp',
            ],
        ],
        'teacher' => [
            [
                'name' => 'Cô Mai',
                'role' => 'Lead teacher',
                'quote' => 'Little Seed tạo không gian để giáo viên quan sát sâu hơn thay vì chỉ chạy theo bài học. Trẻ tiến bộ theo nhịp riêng.',
                'avatar' => 'trust-teachers-team-group.webp',
            ],
            [
                'name' => 'Cô Trâm',
                'role' => 'English guide',
                'quote' => 'Tiếng Anh ở đây là trải nghiệm thật. Trẻ lặp lại trong ngữ cảnh nên rất tự nhiên và không bị áp lực.',
                'avatar' => 'trust-teacher-training-workshop.webp',
            ],
        ],
    ];
}

function ls_get_blog_posts_data(): array {
    return [
        [
            'title' => 'Vì sao trẻ mầm non cần học cách tự lập?',
            'slug' => 'vi-sao-tre-mam-non-can-hoc-cach-tu-lap',
            'category' => 'Montessori',
            'date' => '2026-06-12',
            'excerpt' => 'Tự lập là nền móng giúp trẻ tự tin, biết chờ đợi và xử lý những việc nhỏ trong ngày học.',
            'image' => 'blog-montessori-independence-thumbnail.webp',
        ],
        [
            'title' => 'Cách giúp con yêu thích tiếng Anh tự nhiên',
            'slug' => 'cach-giup-con-yeu-thich-tieng-anh-tu-nhien',
            'category' => 'Song ngữ',
            'date' => '2026-06-03',
            'excerpt' => 'Tiếng Anh hiệu quả nhất ở lứa mầm non thường đến từ trải nghiệm, lặp lại và cảm xúc tích cực.',
            'image' => 'blog-child-language-development-thumbnail.webp',
        ],
        [
            'title' => 'Checklist chọn trường mầm non an toàn cho bé',
            'slug' => 'checklist-chon-truong-mam-non-an-toan-cho-be',
            'category' => 'Tuyển sinh',
            'date' => '2026-05-26',
            'excerpt' => 'Một danh sách ngắn để phụ huynh quan sát lớp học, bữa ăn và quy trình đón trả trẻ.',
            'image' => 'faq-parent-support-meeting.webp',
        ],
    ];
}

function ls_get_faq_groups(): array {
    return [
        [
            'title' => 'Tuyển sinh',
            'items' => [
                [
                    'question' => 'Quy trình đăng ký tham quan trường như thế nào?',
                    'answer' => 'Phụ huynh gửi form hoặc gọi hotline, Little Seed xác nhận lịch và chuẩn bị buổi tham quan phù hợp với gia đình.',
                ],
                [
                    'question' => 'Con chưa đi học có được nhận tư vấn không?',
                    'answer' => 'Có. Đội ngũ sẽ hỏi độ tuổi, thói quen sinh hoạt và nhu cầu để gợi ý lớp phù hợp.',
                ],
            ],
        ],
        [
            'title' => 'Học phí',
            'items' => [
                [
                    'question' => 'Học phí có cố định không?',
                    'answer' => 'Học phí có thể thay đổi theo cơ sở và chương trình, vì vậy phụ huynh nên nhận bảng tư vấn cập nhật từ trường.',
                ],
                [
                    'question' => 'Có phí nào ngoài học phí không?',
                    'answer' => 'Tuỳ thời điểm và cơ sở, có thể có khoản đồng phục, ăn uống hoặc ngoại khoá. Tất cả sẽ được thông báo rõ trong tư vấn.',
                ],
            ],
        ],
        [
            'title' => 'Dinh dưỡng',
            'items' => [
                [
                    'question' => 'Bữa ăn ở trường được chuẩn bị ra sao?',
                    'answer' => 'Thực đơn cân bằng, ưu tiên nguyên liệu an toàn và nhiều rau, được điều chỉnh theo lứa tuổi và nhu cầu của trẻ.',
                ],
                [
                    'question' => 'Có hỗ trợ bé kén ăn không?',
                    'answer' => 'Giáo viên sẽ đồng hành theo nhịp ăn của bé, khích lệ nhẹ nhàng và trao đổi với gia đình khi cần.',
                ],
            ],
        ],
        [
            'title' => 'Chương trình học',
            'items' => [
                [
                    'question' => 'Montessori-inspired có nghĩa là gì?',
                    'answer' => 'Đó là cách tổ chức lớp học khuyến khích trẻ tự chọn, tự làm, quan sát và học qua trải nghiệm thực tế.',
                ],
                [
                    'question' => 'Tiếng Anh được dạy theo cách nào?',
                    'answer' => 'Tiếng Anh được lồng vào sinh hoạt, trò chơi, vòng tròn và các chủ đề gần gũi thay vì chỉ học thuộc lòng.',
                ],
            ],
        ],
        [
            'title' => 'An toàn & chăm sóc',
            'items' => [
                [
                    'question' => 'Trường có quy trình an toàn cho trẻ không?',
                    'answer' => 'Có. Lớp học, sân chơi và giờ sinh hoạt đều có quy trình quan sát, đón trả và phản hồi với gia đình.',
                ],
                [
                    'question' => 'Phụ huynh có được cập nhật tình hình con không?',
                    'answer' => 'Phụ huynh được cập nhật qua trao đổi định kỳ, nhật ký học tập và các kênh thông tin của trường.',
                ],
            ],
        ],
    ];
}

function ls_get_process_steps(): array {
    return [
        [
            'step' => '01',
            'title' => 'Để lại thông tin',
            'text' => 'Phụ huynh điền form hoặc liên hệ hotline để Little Seed nắm nhu cầu và độ tuổi của bé.',
        ],
        [
            'step' => '02',
            'title' => 'Tư vấn chương trình',
            'text' => 'Đội ngũ sẽ giới thiệu lộ trình phù hợp, giải đáp câu hỏi về lớp học, học phí và lịch sinh hoạt.',
        ],
        [
            'step' => '03',
            'title' => 'Tham quan trường',
            'text' => 'Gia đình đến trải nghiệm môi trường thật, cảm nhận lớp học, bữa ăn và cách giáo viên tương tác.',
        ],
        [
            'step' => '04',
            'title' => 'Hoàn tất hồ sơ',
            'text' => 'Nếu phù hợp, Little Seed hỗ trợ hoàn thành hồ sơ nhập học và lịch bắt đầu lớp.',
        ],
    ];
}

function ls_get_team_members(): array {
    return [
        [
            'name' => 'Cô Lan Anh',
            'role' => 'Academic Director',
            'text' => 'Định hướng chương trình, quan sát tiến độ học tập và kết nối gia đình với mục tiêu phát triển từng giai đoạn.',
            'image' => 'trust-teachers-team-group.webp',
        ],
        [
            'name' => 'Cô Minh Thư',
            'role' => 'Lead Montessori Guide',
            'text' => 'Đồng hành cùng trẻ trong hoạt động thực hành, tự phục vụ và khơi gợi khả năng tự giải quyết vấn đề.',
            'image' => 'homepage-teacher-child-guidance.webp',
        ],
        [
            'name' => 'Cô Hạnh Dung',
            'role' => 'English Program Lead',
            'text' => 'Thiết kế hoạt động tiếng Anh tự nhiên, phù hợp lứa tuổi và giúp trẻ tự tin sử dụng ngôn ngữ trong bối cảnh thật.',
            'image' => 'trust-teacher-training-workshop.webp',
        ],
    ];
}

function ls_get_footer_socials(): array {
    return [
        ['label' => 'Facebook', 'href' => '#', 'icon' => 'facebook'],
        ['label' => 'Instagram', 'href' => '#', 'icon' => 'instagram'],
        ['label' => 'YouTube', 'href' => '#', 'icon' => 'youtube'],
    ];
}

function ls_social_icon_svg(string $icon): string {
    $paths = [
        'facebook' => '<path d="M13.4 20v-7.1h2.4l.36-2.77H13.4V8.36c0-.8.22-1.35 1.38-1.35h1.47V4.53c-.25-.03-1.13-.11-2.14-.11-2.12 0-3.57 1.29-3.57 3.67v2.04H8.15v2.77h2.39V20h2.86Z"/>',
        'instagram' => '<path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4Zm10 2H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2Zm-5 3.5A4.5 4.5 0 1 1 7.5 13 4.5 4.5 0 0 1 12 8.5Zm0 2A2.5 2.5 0 1 0 14.5 13 2.5 2.5 0 0 0 12 10.5ZM17 6.75a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 17 6.75Z"/>',
        'youtube' => '<path d="M21.6 7.2a2.5 2.5 0 0 0-1.76-1.76C18.28 5 12 5 12 5s-6.28 0-7.84.44A2.5 2.5 0 0 0 2.4 7.2 26.8 26.8 0 0 0 2 12a26.8 26.8 0 0 0 .4 4.8 2.5 2.5 0 0 0 1.76 1.76C5.72 19 12 19 12 19s6.28 0 7.84-.44a2.5 2.5 0 0 0 1.76-1.76A26.8 26.8 0 0 0 22 12a26.8 26.8 0 0 0-.4-4.8ZM10 15V9l5 3-5 3Z"/>',
    ];
    return sprintf('<svg class="social-icon social-icon--%s" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="currentColor">%s</svg>', esc_attr($icon), $paths[$icon] ?? '<circle cx="12" cy="12" r="10"/>');
}

function ls_icon_svg(string $icon): string {
    $map = [
        'leaf' => '<path d="M5 19c7.5 0 14-4.5 14-14 0-.6-.4-1-1-1-9.5 0-14 6.5-14 14 0 .6.4 1 1 1Zm2-2c.4-3.7 2.2-6.2 5-7.8C10.4 11.6 8.3 13.8 7 17Zm7.5-8.6c-1.7.5-3.2 1.4-4.4 2.6 1.6.3 3.1.9 4.4 1.8.3-1.3.3-2.9 0-4.4Z"/>',
        'language' => '<path d="M4 5h9a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H9l-4 4v-4H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm13 3h3a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-1v3l-3-3h-1a2 2 0 0 1-2-2v-1h4a2 2 0 0 0 2-2V8Z"/>',
        'heart' => '<path d="M12 20s-7-4.5-9.2-8.8A5.5 5.5 0 0 1 12 5.7a5.5 5.5 0 0 1 9.2 5.5C19 15.5 12 20 12 20Z"/>',
        'teacher' => '<path d="M8 4a4 4 0 1 1 8 0v4h2a2 2 0 0 1 2 2v1h-2v9a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-9H4V10a2 2 0 0 1 2-2h2V4Zm2 0v4h4V4a2 2 0 1 0-4 0Zm-1 12h6v-2H9v2Zm0-4h6v-2H9v2Z"/>',
        'play' => '<path d="M8 5v14l11-7L8 5Z"/>',
        'map' => '<path d="M9 4 3 6.5v13L9 17l6 2.5 6-2.5v-13L15 6 9 4Zm0 2.1 4 1.6v10.2l-4-1.6V6.1Zm6 1.6 4-1.6v10.2l-4 1.6V7.7ZM5 8l2-.8v10.2L5 18V8Z"/>',
        'calendar' => '<path d="M7 2v2H5a2 2 0 0 0-2 2v3h18V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7Zm14 9H3v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8Z"/>',
        'phone' => '<path d="M6.6 3.5 9.2 6c.7.7.8 1.8.2 2.6l-1 1.3c1 2 2.8 3.8 4.8 4.8l1.3-1c.8-.6 1.9-.5 2.6.2l2.5 2.6c.7.7.8 1.8.2 2.6l-1.4 1.9c-.6.8-1.6 1.2-2.6.9-7.7-2.2-13.6-8.1-15.8-15.8-.3-1 .1-2 .9-2.6L4 3.3c.8-.6 1.9-.5 2.6.2Z"/>',
        'mail' => '<path d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm0 3 8 5 8-5V7l-8 5-8-5v1Z"/>',
        'arrow' => '<path d="M13.2 5.3 19.9 12l-6.7 6.7-1.4-1.4 4.3-4.3H4v-2h12.1l-4.3-4.3 1.4-1.4Z"/>',
        'check' => '<path d="M9.5 18.2 4.8 13.5l1.4-1.4 3.3 3.3 8.3-8.3 1.4 1.4-9.7 9.7Z"/>',
        'quote' => '<path d="M7 6h5v6H8l-1 6H4l1-8V6Zm10 0h3v6h-4l-1 6h-3l1-8V6h4Z"/>',
        'facebook' => '<path d="M14 3h4a1 1 0 0 1 1 1v4h-3v3h3v9h-4v-9h-3V8h3V5.5A2.5 2.5 0 0 1 17.5 3H14z"/>',
        'instagram' => '<path d="M7 3h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4Zm10 2H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2Zm-5 3.5A4.5 4.5 0 1 1 7.5 13 4.5 4.5 0 0 1 12 8.5Zm0 2A2.5 2.5 0 1 0 14.5 13 2.5 2.5 0 0 0 12 10.5ZM17 6.75a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 17 6.75Z"/>',
        'youtube' => '<path d="M21.6 7.2a2.5 2.5 0 0 0-1.76-1.76C18.28 5 12 5 12 5s-6.28 0-7.84.44A2.5 2.5 0 0 0 2.4 7.2 26.8 26.8 0 0 0 2 12a26.8 26.8 0 0 0 .4 4.8 2.5 2.5 0 0 0 1.76 1.76C5.72 19 12 19 12 19s6.28 0 7.84-.44a2.5 2.5 0 0 0 1.76-1.76A26.8 26.8 0 0 0 22 12a26.8 26.8 0 0 0-.4-4.8ZM10 15V9l5 3-5 3Z"/>',
        'close' => '<path d="M6.4 5 5 6.4 10.6 12 5 17.6 6.4 19 12 13.4 17.6 19 19 17.6 13.4 12 19 6.4 17.6 5 12 10.6 6.4 5Z"/>',
    ];
    return sprintf('<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="currentColor">%s</svg>', $map[$icon] ?? $map['arrow']);
}

function ls_render_button(string $label, string $href, string $variant = 'primary', string $icon = 'arrow', array $attrs = []): string {
    $class = 'button button--' . $variant;
    if (isset($attrs['class'])) {
        $class .= ' ' . (string) $attrs['class'];
        unset($attrs['class']);
    }
    $extra = '';
    foreach ($attrs as $key => $value) {
        $extra .= ' ' . esc_attr((string) $key) . '="' . esc_attr((string) $value) . '"';
    }
    return '<a class="' . esc_attr($class) . '" href="' . esc_url($href) . '"' . $extra . '><span>' . esc_html($label) . '</span>' . ls_icon_svg($icon) . '</a>';
}

function ls_render_section_title(string $eyebrow, string $title, string $description = '', string $align = 'left'): void {
    ?>
    <div class="section-title section-title--<?php echo esc_attr($align); ?>">
        <?php if ($eyebrow !== '') : ?>
            <p class="section-title__eyebrow"><?php echo esc_html($eyebrow); ?></p>
        <?php endif; ?>
        <h2><?php echo esc_html($title); ?></h2>
        <?php if ($description !== '') : ?>
            <p class="section-title__desc"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
    </div>
    <?php
}

function ls_render_stats(array $items): void {
    if (!$items) {
        return;
    }
    ?>
    <div class="stats-row">
        <?php foreach ($items as $item) : ?>
            <div class="stats-row__item">
                <strong><?php echo esc_html($item['value']); ?></strong>
                <span><?php echo esc_html($item['label']); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

function ls_render_top_bar(): void {
    $socials = ls_get_footer_socials();
    ?>
    <div class="top-bar">
        <div class="container top-bar__inner">
            <div class="top-bar__contacts">
                <a href="tel:02870001122"><?php echo ls_icon_svg('phone'); ?><span>028 7000 1122</span></a>
                <a href="mailto:admissions@littleseed.edu.vn"><?php echo ls_icon_svg('mail'); ?><span>admissions@littleseed.edu.vn</span></a>
            </div>
            <div class="top-bar__socials" aria-label="<?php esc_attr_e('Social links', 'little-seed-preschool'); ?>">
                <?php foreach ($socials as $social) : ?>
                    <a href="<?php echo esc_url($social['href']); ?>" class="icon-button" aria-label="<?php echo esc_attr($social['label']); ?>">
                        <?php echo ls_social_icon_svg($social['icon']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}

function ls_render_site_header(): void {
    $navigation = ls_get_navigation_data();
    ?>
    <header class="site-header" data-site-header>
        <div class="container site-header__inner">
            <div class="site-header__brand">
                <a class="brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <span class="brand__mark" aria-hidden="true">
                        <img src="<?php echo esc_url(ls_get_image_url('little-seed-logo-mark.svg')); ?>" alt="" width="64" height="64">
                    </span>
                    <span class="brand__text">
                        <strong>Little Seed</strong>
                        <small>Montessori Preschool</small>
                    </span>
                </a>
            </div>
            <nav class="site-nav" aria-label="<?php esc_attr_e('Primary navigation', 'little-seed-preschool'); ?>">
                <ul class="site-nav__list">
                    <?php foreach ($navigation as $item) : ?>
                        <li class="site-nav__item<?php echo !empty($item['children']) ? ' has-children' : ''; ?>">
                            <?php if (!empty($item['children'])) : ?>
                                <button class="site-nav__toggle" type="button" aria-expanded="false">
                                    <span><?php echo esc_html($item['label']); ?></span>
                                    <span class="site-nav__chevron" aria-hidden="true"></span>
                                </button>
                                <div class="mega-menu" role="group">
                                    <a class="mega-menu__heading" href="<?php echo esc_url($item['href']); ?>">
                                        <strong><?php echo esc_html($item['label']); ?></strong>
                                        <span><?php esc_html_e('Khám phá', 'little-seed-preschool'); ?></span>
                                    </a>
                                    <ul class="mega-menu__list">
                                        <?php foreach ($item['children'] as $child) : ?>
                                            <li><a href="<?php echo esc_url($child['href']); ?>"><?php echo esc_html($child['label']); ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php else : ?>
                                <a class="site-nav__link" href="<?php echo esc_url($item['href']); ?>"><?php echo esc_html($item['label']); ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="site-header__spacer" aria-hidden="true"></div>
            <div class="site-header__actions">
                <a class="button button--ghost button--icon-only site-header__call" href="tel:02870001122" aria-label="<?php esc_attr_e('Call admissions', 'little-seed-preschool'); ?>">
                    <?php echo ls_icon_svg('phone'); ?>
                </a>
                <button class="menu-toggle icon-button" type="button" aria-expanded="false" aria-controls="mobile-drawer" data-mobile-menu-toggle>
                    <span class="menu-toggle__bars" aria-hidden="true"></span>
                    <span class="screen-reader-text"><?php esc_html_e('Open menu', 'little-seed-preschool'); ?></span>
                </button>
            </div>
        </div>
    </header>
    <?php
    ls_render_mobile_drawer($navigation);
}

function ls_render_mobile_drawer(array $navigation): void {
    ?>
    <div class="mobile-drawer" id="mobile-drawer" hidden>
        <div class="mobile-drawer__overlay" data-mobile-menu-close></div>
        <aside class="mobile-drawer__panel" aria-label="<?php esc_attr_e('Mobile navigation', 'little-seed-preschool'); ?>">
            <div class="mobile-drawer__head">
                <a class="brand brand--drawer" href="<?php echo esc_url(home_url('/')); ?>">
                    <span class="brand__mark" aria-hidden="true">
                        <img src="<?php echo esc_url(ls_get_image_url('little-seed-logo-mark.svg')); ?>" alt="" width="64" height="64">
                    </span>
                    <span class="brand__text">
                        <strong>Little Seed</strong>
                        <small>Montessori Preschool</small>
                    </span>
                </a>
                <button class="icon-button mobile-drawer__close" type="button" data-mobile-menu-close aria-label="<?php esc_attr_e('Close menu', 'little-seed-preschool'); ?>">
                    <?php echo ls_icon_svg('close'); ?>
                </button>
            </div>
            <div class="mobile-drawer__content">
                <a class="button button--primary button--full" href="<?php echo esc_url(home_url('/school-tour/')); ?>"><?php esc_html_e('Đăng ký tham quan trường', 'little-seed-preschool'); ?></a>
                <nav class="mobile-nav" aria-label="<?php esc_attr_e('Mobile navigation', 'little-seed-preschool'); ?>">
                    <?php foreach ($navigation as $item) : ?>
                        <?php if (!empty($item['children'])) : ?>
                            <details class="mobile-nav__group">
                                <summary>
                                    <span><?php echo esc_html($item['label']); ?></span>
                                    <span class="mobile-nav__marker" aria-hidden="true"></span>
                                </summary>
                                <a class="mobile-nav__link mobile-nav__link--parent" href="<?php echo esc_url($item['href']); ?>"><?php echo esc_html($item['label']); ?></a>
                                <ul>
                                    <?php foreach ($item['children'] as $child) : ?>
                                        <li><a class="mobile-nav__link" href="<?php echo esc_url($child['href']); ?>"><?php echo esc_html($child['label']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </details>
                        <?php else : ?>
                            <a class="mobile-nav__group mobile-nav__group--link" href="<?php echo esc_url($item['href']); ?>"><?php echo esc_html($item['label']); ?></a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </nav>
                <div class="mobile-drawer__contact">
                    <a href="tel:02870001122"><?php echo ls_icon_svg('phone'); ?><span>028 7000 1122</span></a>
                    <a href="mailto:admissions@littleseed.edu.vn"><?php echo ls_icon_svg('mail'); ?><span>admissions@littleseed.edu.vn</span></a>
                </div>
            </div>
        </aside>
    </div>
    <?php
}

function ls_render_site_footer(): void {
    $programs = array_slice(ls_get_programs_data(), 0, 4);
    $campuses = ls_get_campuses_data();
    $socials = ls_get_footer_socials();
    ?>
    <footer class="site-footer">
        <div class="container site-footer__grid">
            <div class="site-footer__brand">
                <a class="brand brand--footer" href="<?php echo esc_url(home_url('/')); ?>">
                    <span class="brand__mark" aria-hidden="true">
                        <img src="<?php echo esc_url(ls_get_image_url('little-seed-logo-mark.svg')); ?>" alt="" width="64" height="64">
                    </span>
                    <span class="brand__text">
                        <strong>Little Seed</strong>
                        <small>Montessori Preschool</small>
                    </span>
                </a>
                <p><?php echo esc_html('Nuôi dưỡng tự lập - Khơi mở tương lai.'); ?></p>
                <div class="site-footer__socials">
                    <?php foreach ($socials as $social) : ?>
                        <a href="<?php echo esc_url($social['href']); ?>" class="icon-button" aria-label="<?php echo esc_attr($social['label']); ?>">
                            <?php echo ls_social_icon_svg($social['icon']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="site-footer__col">
                <h3><?php esc_html_e('Chương trình', 'little-seed-preschool'); ?></h3>
                <ul>
                    <?php foreach ($programs as $program) : ?>
                        <li><a href="<?php echo esc_url(home_url('/chuong-trinh/' . $program['slug'] . '/')); ?>"><?php echo esc_html($program['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="site-footer__col">
                <h3><?php esc_html_e('Tuyển sinh', 'little-seed-preschool'); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/tuyen-sinh/')); ?>"><?php esc_html_e('Quy trình tuyển sinh', 'little-seed-preschool'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/school-tour/')); ?>"><?php esc_html_e('Đăng ký school tour', 'little-seed-preschool'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/hoc-phi/')); ?>"><?php esc_html_e('Học phí', 'little-seed-preschool'); ?></a></li>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>"><?php esc_html_e('FAQ', 'little-seed-preschool'); ?></a></li>
                </ul>
            </div>
            <div class="site-footer__col">
                <h3><?php esc_html_e('Cơ sở', 'little-seed-preschool'); ?></h3>
                <ul>
                    <?php foreach ($campuses as $campus) : ?>
                        <li><a href="<?php echo esc_url(home_url('/co-so/' . $campus['slug'] . '/')); ?>"><?php echo esc_html($campus['title']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="site-footer__col">
                <h3><?php esc_html_e('Liên hệ', 'little-seed-preschool'); ?></h3>
                <ul class="site-footer__contact">
                    <li><a href="tel:02870001122"><?php echo ls_icon_svg('phone'); ?><span>028 7000 1122</span></a></li>
                    <li><a href="mailto:admissions@littleseed.edu.vn"><?php echo ls_icon_svg('mail'); ?><span>admissions@littleseed.edu.vn</span></a></li>
                    <li><span><?php echo esc_html__('Thời gian tư vấn: 08:00 - 17:30', 'little-seed-preschool'); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="container site-footer__bottom">
            <p>&copy; <?php echo esc_html(date('Y')); ?> Little Seed Montessori Preschool. Demo website.</p>
            <p><?php echo esc_html__('Designed for admissions, school tours, tuition inquiry and bilingual preschool storytelling.', 'little-seed-preschool'); ?></p>
        </div>
    </footer>
    <?php
}

function ls_render_floating_actions(): void {
    ?>
    <div class="floating-actions" aria-label="<?php esc_attr_e('Quick actions', 'little-seed-preschool'); ?>">
        <a class="floating-actions__item" href="tel:02870001122" aria-label="<?php esc_attr_e('Call admissions', 'little-seed-preschool'); ?>">
            <?php echo ls_icon_svg('phone'); ?>
            <span><?php esc_html_e('Gọi nhanh', 'little-seed-preschool'); ?></span>
        </a>
        <a class="floating-actions__item" href="<?php echo esc_url(home_url('/school-tour/')); ?>" aria-label="<?php esc_attr_e('Register school tour', 'little-seed-preschool'); ?>">
            <?php echo ls_icon_svg('calendar'); ?>
            <span><?php esc_html_e('Tour', 'little-seed-preschool'); ?></span>
        </a>
    </div>
    <?php
}

function ls_render_global_toast(): void {
    ?>
    <div class="toast-stack" aria-live="polite" aria-atomic="true" data-toast-stack></div>
    <?php
}

function ls_render_brochure_modal(): void {
    ?>
    <div class="modal" hidden data-brochure-modal>
        <div class="modal__overlay" data-modal-close></div>
        <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="brochure-modal-title">
            <button class="icon-button modal__close" type="button" aria-label="<?php esc_attr_e('Close brochure form', 'little-seed-preschool'); ?>" data-modal-close><?php echo ls_icon_svg('close'); ?></button>
            <div class="modal__content">
                <div class="modal__intro">
                    <p class="eyebrow"><?php esc_html_e('Brochure demo', 'little-seed-preschool'); ?></p>
                    <h2 id="brochure-modal-title"><?php esc_html_e('Tải brochure chương trình học Little Seed', 'little-seed-preschool'); ?></h2>
                    <p><?php esc_html_e('Để lại thông tin, Little Seed sẽ ghi nhận yêu cầu và phản hồi qua kênh tư vấn demo.', 'little-seed-preschool'); ?></p>
                </div>
                <?php ls_render_consultation_form([
                    'form_type' => 'brochure',
                    'compact' => true,
                    'brochure' => true,
                    'submit_label' => 'Nhận brochure',
                    'show_brochure' => false,
                ]); ?>
            </div>
        </div>
    </div>
    <?php
}

function ls_render_breadcrumbs(array $items): void {
    if (!$items) {
        return;
    }
    ?>
    <nav class="breadcrumbs" aria-label="<?php esc_attr_e('Breadcrumb', 'little-seed-preschool'); ?>">
        <ol>
            <?php foreach ($items as $index => $item) : ?>
                <li>
                    <?php if ($index < count($items) - 1) : ?>
                        <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['name']); ?></a>
                    <?php else : ?>
                        <span aria-current="page"><?php echo esc_html($item['name']); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php
}

function ls_render_feature_list(array $items): void {
    if (!$items) {
        return;
    }
    ?>
    <ul class="feature-list">
        <?php foreach ($items as $item) : ?>
            <li>
                <span class="feature-list__icon" aria-hidden="true"><?php echo ls_icon_svg('check'); ?></span>
                <span><?php echo esc_html($item); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}

function ls_render_image_frame(string $image, string $class = '', array $attrs = []): void {
    $spec = ls_get_image_spec($image);
    if (!$spec) {
        return;
    }
    $figure_class = trim('image-frame ' . $class);
    ?>
    <figure class="<?php echo esc_attr($figure_class); ?>">
        <?php echo ls_render_image($image, $attrs); ?>
    </figure>
    <?php
}

function ls_render_program_card(array $program): void {
    ?>
    <article class="program-card">
        <a href="<?php echo esc_url(home_url('/chuong-trinh/' . $program['slug'] . '/')); ?>" class="program-card__media">
            <?php echo ls_render_image($program['image'], ['class' => 'program-card__img']); ?>
        </a>
        <div class="program-card__body">
            <p class="eyebrow"><?php echo esc_html($program['age']); ?></p>
            <h3><a href="<?php echo esc_url(home_url('/chuong-trinh/' . $program['slug'] . '/')); ?>"><?php echo esc_html($program['title']); ?></a></h3>
            <p><?php echo esc_html($program['excerpt']); ?></p>
            <?php ls_render_feature_list($program['highlights']); ?>
            <?php echo ls_render_button('Xem chương trình', home_url('/chuong-trinh/' . $program['slug'] . '/'), 'secondary', 'arrow'); ?>
        </div>
    </article>
    <?php
}

function ls_render_campus_card(array $campus): void {
    ?>
    <article class="campus-card">
        <a href="<?php echo esc_url(home_url('/co-so/' . $campus['slug'] . '/')); ?>" class="campus-card__media">
            <?php echo ls_render_image($campus['image'], ['class' => 'campus-card__img']); ?>
        </a>
        <div class="campus-card__body">
            <p class="eyebrow"><?php echo esc_html($campus['region']); ?></p>
            <h3><a href="<?php echo esc_url(home_url('/co-so/' . $campus['slug'] . '/')); ?>"><?php echo esc_html($campus['title']); ?></a></h3>
            <p><?php echo esc_html($campus['address']); ?></p>
            <ul class="campus-card__meta">
                <li><?php echo ls_icon_svg('phone'); ?><span><?php echo esc_html($campus['hotline']); ?></span></li>
                <li><?php echo ls_icon_svg('calendar'); ?><span><?php echo esc_html($campus['hours']); ?></span></li>
            </ul>
            <div class="card-actions">
                <?php echo ls_render_button('Đăng ký tham quan', home_url('/school-tour/'), 'primary', 'arrow'); ?>
                <?php echo ls_render_button('Xem cơ sở', home_url('/co-so/' . $campus['slug'] . '/'), 'ghost', 'arrow'); ?>
            </div>
        </div>
    </article>
    <?php
}

function ls_render_blog_card(WP_Post $post): void {
    $slug = $post->post_name;
    $posts_data = ls_get_blog_posts_data();
    $spec = null;
    foreach ($posts_data as $data) {
        if ($data['slug'] === $slug) {
            $spec = $data;
            break;
        }
    }
    $image = $spec['image'] ?? 'blog-montessori-independence-thumbnail.webp';
    $category = $spec['category'] ?? 'News';
    $date = $spec['date'] ?? get_the_date('Y-m-d', $post);
    $excerpt = $spec['excerpt'] ?? get_the_excerpt($post);
    ?>
    <article class="blog-card">
        <a href="<?php echo esc_url(get_permalink($post)); ?>" class="blog-card__media">
            <?php echo ls_render_image($image, ['class' => 'blog-card__img']); ?>
        </a>
        <div class="blog-card__body">
            <div class="blog-card__meta">
                <span><?php echo esc_html($category); ?></span>
                <time datetime="<?php echo esc_attr($date); ?>"><?php echo esc_html(date_i18n('d/m/Y', strtotime($date))); ?></time>
            </div>
            <h3><a href="<?php echo esc_url(get_permalink($post)); ?>"><?php echo esc_html(get_the_title($post)); ?></a></h3>
            <p><?php echo esc_html($excerpt); ?></p>
            <?php echo ls_render_button('Đọc thêm', get_permalink($post), 'secondary', 'arrow'); ?>
        </div>
    </article>
    <?php
}

function ls_render_home_hero(): void {
    $slides = ls_get_home_slides();
    ?>
    <section class="hero-slider section section--hero" data-hero-slider>
        <div class="hero-slider__viewport">
            <div class="hero-slider__track" data-hero-track>
                <?php foreach ($slides as $index => $slide) : ?>
                    <article class="hero-slide<?php echo $index === 0 ? ' is-active' : ''; ?>" data-hero-slide>
                        <div class="container hero-slide__inner">
                            <div class="hero-slide__copy">
                                <p class="eyebrow"><?php echo esc_html($slide['eyebrow']); ?></p>
                                <h1><?php echo esc_html($slide['title']); ?></h1>
                                <p class="hero-slide__text"><?php echo esc_html($slide['text']); ?></p>
                                <div class="hero-slide__actions">
                                    <?php echo ls_render_button($slide['cta'], home_url('/school-tour/'), 'primary', 'arrow'); ?>
                                    <?php echo ls_render_button($slide['secondary'], $slide['secondary_href'] ?? home_url('/hoc-phi/'), 'secondary', $slide['secondary_icon'] ?? 'calendar'); ?>
                                </div>
                            </div>
                            <div class="hero-slide__media">
                                <?php echo ls_render_image($slide['image'], ['class' => 'hero-slide__img']); ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="container hero-slider__controls">
            <button class="icon-button" type="button" data-hero-prev aria-label="<?php esc_attr_e('Previous slide', 'little-seed-preschool'); ?>"><?php echo ls_icon_svg('arrow'); ?></button>
            <div class="hero-slider__dots" data-hero-dots></div>
            <button class="icon-button" type="button" data-hero-next aria-label="<?php esc_attr_e('Next slide', 'little-seed-preschool'); ?>"><?php echo ls_icon_svg('arrow'); ?></button>
        </div>
    </section>
    <?php
}

function ls_render_about_section(): void {
    ?>
    <section class="section section--soft" id="about">
        <div class="container section-grid section-grid--about">
            <div>
                <?php ls_render_section_title('Về trường', 'Về Trường Mầm Non Little Seed', 'Little Seed là môi trường song ngữ theo cảm hứng Montessori, tập trung tự lập, chăm sóc cảm xúc, tiếng Anh tự nhiên và an toàn toàn diện.'); ?>
                <div class="content-stack">
                    <p>Chúng tôi thiết kế từng nhịp sinh hoạt để trẻ có thể tự phục vụ, tự chọn hoạt động và học cách giao tiếp lịch sự với bạn bè, thầy cô. Đội ngũ Little Seed phối hợp cùng gia đình để mỗi ngày đến lớp là một ngày con được lắng nghe, được nâng đỡ và được khám phá theo tốc độ riêng.</p>
                    <p>Phương pháp Montessori-inspired tại Little Seed không chạy theo khuôn mẫu cứng. Thay vào đó, trường tạo ra môi trường đủ đẹp, đủ an toàn và đủ giàu trải nghiệm để trẻ bộc lộ khả năng tự học của mình một cách tự nhiên.</p>
                </div>
                <?php ls_render_stats([
                    ['value' => '3', 'label' => 'cơ sở demo'],
                    ['value' => '4', 'label' => 'chương trình học'],
                    ['value' => '100%', 'label' => 'tập trung vào trải nghiệm trẻ'],
                ]); ?>
                <div class="section-actions">
                    <?php echo ls_render_button('Tìm hiểu thêm', home_url('/gioi-thieu/'), 'primary', 'arrow'); ?>
                    <?php echo ls_render_button('Xem phương pháp', home_url('/phuong-phap-montessori/'), 'secondary', 'leaf'); ?>
                </div>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-about-montessori-classroom.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_why_choose_section(): void {
    $items = ls_get_why_choose_items();
    ?>
    <section class="section section--white" id="why-choose">
        <div class="container">
            <?php ls_render_section_title('Vì sao chọn Little Seed', 'Những lý do phụ huynh tin chọn Little Seed', 'Mỗi lớp học được thiết kế để con tự lập hơn, vui vẻ hơn và kết nối tốt hơn với thế giới xung quanh.'); ?>
            <div class="card-grid card-grid--4">
                <?php foreach ($items as $item) : ?>
                    <article class="info-card">
                        <div class="info-card__icon" aria-hidden="true"><?php echo ls_icon_svg($item['icon']); ?></div>
                        <h3><?php echo esc_html($item['title']); ?></h3>
                        <p><?php echo esc_html($item['description']); ?></p>
                        <a href="<?php echo esc_url(home_url('/gioi-thieu/')); ?>"><?php esc_html_e('Tìm hiểu thêm', 'little-seed-preschool'); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_program_tabs_section(): void {
    $programs = ls_get_programs_data();
    ?>
    <section class="section section--cream" id="programs">
        <div class="container">
            <?php ls_render_section_title('Chương trình học', '4 chương trình học theo từng giai đoạn phát triển', 'Desktop dùng tabs, mobile chuyển thành accordion để ba mẹ dễ đọc và lựa chọn.'); ?>
            <div class="program-tabs" data-program-tabs>
                <div class="program-tabs__nav" role="tablist" aria-label="<?php esc_attr_e('Programs', 'little-seed-preschool'); ?>">
                    <?php foreach ($programs as $index => $program) : ?>
                        <button class="program-tabs__tab<?php echo $index === 0 ? ' is-active' : ''; ?>" type="button" role="tab" aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>" data-program-tab="<?php echo esc_attr($program['slug']); ?>">
                            <strong><?php echo esc_html($program['title']); ?></strong>
                            <span><?php echo esc_html($program['age']); ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
                <div class="program-tabs__panels">
                    <?php foreach ($programs as $index => $program) : ?>
                        <article class="program-panel<?php echo $index === 0 ? ' is-active' : ''; ?>" data-program-panel="<?php echo esc_attr($program['slug']); ?>" role="tabpanel">
                            <div class="program-panel__media">
                                <?php echo ls_render_image($program['image'], ['class' => 'program-panel__img']); ?>
                            </div>
                            <div class="program-panel__body">
                                <p class="eyebrow"><?php echo esc_html($program['age']); ?></p>
                                <h3><?php echo esc_html($program['title']); ?></h3>
                                <p><?php echo esc_html($program['excerpt']); ?></p>
                                <h4><?php esc_html_e('Điểm nổi bật', 'little-seed-preschool'); ?></h4>
                                <?php ls_render_feature_list($program['highlights']); ?>
                                <?php echo ls_render_button('Xem chương trình', home_url('/chuong-trinh/' . $program['slug'] . '/'), 'primary', 'arrow'); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function ls_get_programs_data(): array {
    return [
        [
            'slug' => 'seedling-standard',
            'title' => 'Seedling Standard',
            'age' => '12 tháng - 3 tuổi',
            'excerpt' => 'Nền tảng ấm áp cho trẻ bắt đầu hành trình tự lập, cảm xúc an toàn và sinh hoạt ổn định.',
            'image' => 'program-toddler-standard-classroom.webp',
            'highlights' => [
                'Môi trường chuẩn bị theo nhu cầu lứa tuổi',
                'Practical life và cảm giác tự phục vụ',
                'Giáo viên theo sát từng bước chuyển tiếp',
                'Nhật ký học tập gửi về gia đình',
            ],
        ],
        [
            'slug' => 'sprout-bilingual',
            'title' => 'Sprout Bilingual',
            'age' => '18 tháng - 6 tuổi',
            'excerpt' => 'Chương trình song ngữ nhẹ nhàng giúp trẻ làm quen tiếng Anh tự nhiên mỗi ngày.',
            'image' => 'program-bilingual-explore-class.webp',
            'highlights' => [
                'Tiếp xúc tiếng Anh tự nhiên',
                'Vòng tròn, trò chơi và phản xạ ngôn ngữ',
                'Nhóm nhỏ với giáo viên đồng hành',
                'Hoạt động gắn với vật thật và hành động',
            ],
        ],
        [
            'slug' => 'bloom-discovery',
            'title' => 'Bloom Discovery',
            'age' => '3 - 6 tuổi',
            'excerpt' => 'Học qua dự án, nghệ thuật và khoa học nhỏ để khơi dậy tinh thần khám phá.',
            'image' => 'program-discover-project-learning.webp',
            'highlights' => [
                'Dự án sáng tạo theo chủ đề',
                'Tăng cường quan sát và diễn đạt',
                'Làm việc độc lập và hợp tác nhóm',
                'Phản hồi định kỳ theo tiến trình',
            ],
        ],
        [
            'slug' => 'global-adventure',
            'title' => 'Global Adventure',
            'age' => '4 - 6 tuổi',
            'excerpt' => 'Mở rộng tiếng Anh, tư duy và sự tự tin cho giai đoạn chuẩn bị vào lớp 1.',
            'image' => 'program-adventure-international-english.webp',
            'highlights' => [
                'English immersion moments',
                'Thuyết trình và kể chuyện',
                'STEM mini-labs và dự án nhóm',
                'Lộ trình sẵn sàng tiểu học',
            ],
        ],
    ];
}

function ls_render_campus_section(): void {
    $campuses = ls_get_campuses_data();
    ?>
    <section class="section section--white" id="campuses">
        <div class="container">
            <?php ls_render_section_title('Cơ sở Little Seed', 'Ba cơ sở demo thuận tiện cho gia đình', 'Mỗi cơ sở có lịch tư vấn, hotline demo và không gian tham quan riêng để ba mẹ cảm nhận thực tế.'); ?>
            <div class="card-grid card-grid--3">
                <?php foreach ($campuses as $campus) : ?>
                    <?php ls_render_campus_card($campus); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_get_campuses_data(): array {
    return [
        [
            'slug' => 'quan-2',
            'title' => 'Little Seed Quận 2',
            'region' => 'Quận 2',
            'address' => '18 Đường Số 12, Phường An Phú, TP. Thủ Đức',
            'hotline' => '028 7000 1122 ext. 201',
            'hours' => '08:00 - 17:30',
            'image' => 'branches-campus-card-visual.webp',
        ],
        [
            'slug' => 'quan-7',
            'title' => 'Little Seed Quận 7',
            'region' => 'Quận 7',
            'address' => '102 Nguyễn Lương Bằng, Phường Tân Phú, Quận 7',
            'hotline' => '028 7000 1122 ext. 202',
            'hours' => '08:00 - 17:30',
            'image' => 'homepage-campus-playground.webp',
        ],
        [
            'slug' => 'binh-thanh',
            'title' => 'Little Seed Bình Thạnh',
            'region' => 'Bình Thạnh',
            'address' => '56 Võ Oanh, Phường 25, Bình Thạnh',
            'hotline' => '028 7000 1122 ext. 203',
            'hours' => '08:00 - 17:30',
            'image' => 'campus-library-reading-corner.webp',
        ],
    ];
}

function ls_render_consultation_form(array $options = []): void {
    $title = $options['title'] ?? 'Ba mẹ cần tư vấn thêm?';
    $context = $options['context'] ?? 'consultation';
    $show_brochure = array_key_exists('show_brochure', $options) ? (bool) $options['show_brochure'] : true;
    $compact = !empty($options['compact']);
    $submit_label = $options['submit_label'] ?? 'Gửi yêu cầu tư vấn';
    ?>
    <form class="lead-form<?php echo $compact ? ' lead-form--compact' : ''; ?>" data-lead-form data-form-type="<?php echo esc_attr($context); ?>">
        <?php wp_nonce_field('ls_lead_form', 'ls_nonce'); ?>
        <input type="hidden" name="action" value="ls_submit_lead_form">
        <input type="hidden" name="form_type" value="<?php echo esc_attr($context); ?>">
        <div class="lead-form__grid">
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-name"><?php esc_html_e('Họ tên phụ huynh', 'little-seed-preschool'); ?></label>
                <input id="<?php echo esc_attr($context); ?>-name" name="name" type="text" required autocomplete="name">
                <small class="field-error" data-field-error="name"></small>
            </div>
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-phone"><?php esc_html_e('Số điện thoại', 'little-seed-preschool'); ?></label>
                <input id="<?php echo esc_attr($context); ?>-phone" name="phone" type="tel" required autocomplete="tel">
                <small class="field-error" data-field-error="phone"></small>
            </div>
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-email"><?php esc_html_e('Email', 'little-seed-preschool'); ?></label>
                <input id="<?php echo esc_attr($context); ?>-email" name="email" type="email" autocomplete="email">
                <small class="field-error" data-field-error="email"></small>
            </div>
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-child-age"><?php esc_html_e('Độ tuổi của bé', 'little-seed-preschool'); ?></label>
                <select id="<?php echo esc_attr($context); ?>-child-age" name="child_age">
                    <option value=""><?php esc_html_e('Chọn độ tuổi', 'little-seed-preschool'); ?></option>
                    <option>12 tháng - 3 tuổi</option>
                    <option>18 tháng - 6 tuổi</option>
                    <option>3 - 6 tuổi</option>
                    <option>4 - 6 tuổi</option>
                </select>
            </div>
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-campus"><?php esc_html_e('Cơ sở quan tâm', 'little-seed-preschool'); ?></label>
                <select id="<?php echo esc_attr($context); ?>-campus" name="campus" required>
                    <option value=""><?php esc_html_e('Chọn cơ sở', 'little-seed-preschool'); ?></option>
                    <option value="Little Seed Quận 2">Little Seed Quận 2</option>
                    <option value="Little Seed Quận 7">Little Seed Quận 7</option>
                    <option value="Little Seed Bình Thạnh">Little Seed Bình Thạnh</option>
                </select>
                <small class="field-error" data-field-error="campus"></small>
            </div>
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-program"><?php esc_html_e('Chương trình quan tâm', 'little-seed-preschool'); ?></label>
                <select id="<?php echo esc_attr($context); ?>-program" name="program">
                    <option value=""><?php esc_html_e('Chọn chương trình', 'little-seed-preschool'); ?></option>
                    <option>Seedling Standard</option>
                    <option>Sprout Bilingual</option>
                    <option>Bloom Discovery</option>
                    <option>Global Adventure</option>
                </select>
            </div>
            <div class="field">
                <label for="<?php echo esc_attr($context); ?>-contact-method"><?php esc_html_e('Hình thức muốn nhận tư vấn', 'little-seed-preschool'); ?></label>
                <select id="<?php echo esc_attr($context); ?>-contact-method" name="contact_method">
                    <option value=""><?php esc_html_e('Chọn hình thức', 'little-seed-preschool'); ?></option>
                    <option>Gọi điện</option>
                    <option>Nhắn Zalo</option>
                    <option>Gửi email</option>
                    <option>Đặt lịch tham quan</option>
                </select>
            </div>
            <div class="field field--full">
                <label for="<?php echo esc_attr($context); ?>-note"><?php esc_html_e('Ghi chú', 'little-seed-preschool'); ?></label>
                <textarea id="<?php echo esc_attr($context); ?>-note" name="note" rows="4"></textarea>
            </div>
        </div>
        <div class="lead-form__extras">
            <?php if (!$compact && $show_brochure) : ?>
                <label class="checkline">
                    <input type="checkbox" name="newsletter" value="1">
                    <span><?php esc_html_e('Nhận thông tin học phí và ưu đãi tuyển sinh', 'little-seed-preschool'); ?></span>
                </label>
            <?php endif; ?>
            <?php if (!$compact) : ?>
                <label class="checkline">
                    <input type="checkbox" name="brochure" value="1"<?php echo !empty($options['brochure']) ? ' checked' : ''; ?>>
                    <span><?php esc_html_e('Gửi thêm brochure chương trình học', 'little-seed-preschool'); ?></span>
                </label>
            <?php endif; ?>
            <input class="lead-form__honeypot" type="text" name="company" tabindex="-1" autocomplete="off" aria-hidden="true">
        </div>
        <div class="lead-form__actions">
            <button class="button button--primary" type="submit">
                <span><?php echo esc_html($submit_label); ?></span>
                <?php echo ls_icon_svg('arrow'); ?>
            </button>
            <p class="lead-form__hint"><?php esc_html_e('Hồ sơ demo sẽ được lưu an toàn nội bộ, không gửi email thật nếu chưa cấu hình.', 'little-seed-preschool'); ?></p>
        </div>
    </form>
    <?php
}

function ls_render_contact_form(): void {
    ls_render_consultation_form([
        'context' => 'contact',
        'title' => 'Liên hệ tư vấn',
        'submit_label' => 'Gửi liên hệ',
        'show_brochure' => false,
    ]);
}

function ls_render_brochure_cta(): void {
    ?>
    <section class="section section--cream">
        <div class="container brochure-cta">
            <div class="brochure-cta__copy">
                <p class="eyebrow"><?php esc_html_e('Brochure', 'little-seed-preschool'); ?></p>
                <h2><?php esc_html_e('Tải brochure chương trình học Little Seed', 'little-seed-preschool'); ?></h2>
                <p><?php esc_html_e('Để lại tên, số điện thoại và email để nhận bản giới thiệu demo phù hợp với độ tuổi của bé.', 'little-seed-preschool'); ?></p>
                <div class="card-actions">
                    <button class="button button--primary" type="button" data-open-brochure-modal>
                        <span><?php esc_html_e('Mở form brochure', 'little-seed-preschool'); ?></span>
                        <?php echo ls_icon_svg('arrow'); ?>
                    </button>
                    <?php echo ls_render_button('Nhận học phí', home_url('/hoc-phi/'), 'secondary', 'calendar'); ?>
                </div>
            </div>
            <div class="brochure-cta__media">
                <?php echo ls_render_image('tuition-consultation-parent-meeting.webp', ['class' => 'brochure-cta__img']); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_testimonial_section(): void {
    $testimonials = ls_get_testimonials_data();
    ?>
    <section class="section section--white" id="testimonials">
        <div class="container">
            <?php ls_render_section_title('Lời chia sẻ', 'Phụ huynh và giáo viên nói gì về Little Seed', 'Các lời chia sẻ demo được viết tự nhiên, gần gũi và không quá “quảng cáo”.'); ?>
            <div class="testimonial-tabs" data-testimonial-tabs>
                <div class="testimonial-tabs__nav" role="tablist" aria-label="<?php esc_attr_e('Testimonials', 'little-seed-preschool'); ?>">
                    <button class="testimonial-tabs__tab is-active" type="button" role="tab" data-testimonial-tab="parent"><?php esc_html_e('Phụ huynh', 'little-seed-preschool'); ?></button>
                    <button class="testimonial-tabs__tab" type="button" role="tab" data-testimonial-tab="teacher"><?php esc_html_e('Giáo viên', 'little-seed-preschool'); ?></button>
                </div>
                <div class="testimonial-tabs__panels">
                    <?php foreach ($testimonials as $tab => $items) : ?>
                        <div class="testimonial-panel<?php echo $tab === 'parent' ? ' is-active' : ''; ?>" data-testimonial-panel="<?php echo esc_attr($tab); ?>">
                            <?php foreach ($items as $item) : ?>
                                <article class="testimonial-card">
                                    <div class="testimonial-card__media">
                                        <?php echo ls_render_image($item['avatar'], ['class' => 'testimonial-card__img']); ?>
                                    </div>
                                    <div class="testimonial-card__body">
                                        <div class="testimonial-card__quote"><?php echo ls_icon_svg('quote'); ?></div>
                                        <p><?php echo esc_html($item['quote']); ?></p>
                                        <strong><?php echo esc_html($item['name']); ?></strong>
                                        <span><?php echo esc_html($item['role']); ?></span>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_blog_section(): void {
    $query = new WP_Query([
        'post_type' => 'ls_news',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'no_found_rows' => true,
    ]);
    ?>
    <section class="section section--soft" id="blog">
        <div class="container">
            <?php ls_render_section_title('Tin tức', 'Bài viết và checklist hữu ích cho phụ huynh', 'Nội dung demo tập trung vào tự lập, tiếng Anh tự nhiên và chọn trường an toàn.'); ?>
            <div class="card-grid card-grid--3">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php ls_render_blog_card($query->post); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <?php foreach (ls_get_blog_posts_data() as $post_data) : ?>
                        <?php
                        $fallback_post = (object) [
                            'ID' => 0,
                            'post_name' => $post_data['slug'],
                            'post_title' => $post_data['title'],
                            'post_excerpt' => $post_data['excerpt'],
                        ];
                        ?>
                        <article class="blog-card">
                            <a href="<?php echo esc_url(home_url('/tin-tuc/' . $post_data['slug'] . '/')); ?>" class="blog-card__media">
                                <?php echo ls_render_image($post_data['image'], ['class' => 'blog-card__img']); ?>
                            </a>
                            <div class="blog-card__body">
                                <div class="blog-card__meta">
                                    <span><?php echo esc_html($post_data['category']); ?></span>
                                    <time datetime="<?php echo esc_attr($post_data['date']); ?>"><?php echo esc_html(date_i18n('d/m/Y', strtotime($post_data['date']))); ?></time>
                                </div>
                                <h3><a href="<?php echo esc_url(home_url('/tin-tuc/' . $post_data['slug'] . '/')); ?>"><?php echo esc_html($post_data['title']); ?></a></h3>
                                <p><?php echo esc_html($post_data['excerpt']); ?></p>
                                <?php echo ls_render_button('Đọc thêm', home_url('/tin-tuc/' . $post_data['slug'] . '/'), 'secondary', 'arrow'); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_final_cta(): void {
    ?>
    <section class="section section--final-cta">
        <div class="container final-cta">
            <div class="final-cta__copy">
                <p class="eyebrow"><?php esc_html_e('Bước tiếp theo', 'little-seed-preschool'); ?></p>
                <h2><?php esc_html_e('Sẵn sàng cho buổi school tour đầu tiên?', 'little-seed-preschool'); ?></h2>
                <p><?php esc_html_e('Hãy đến và cảm nhận không khí lớp học, nhịp sinh hoạt cùng cách Little Seed đồng hành với từng bé.', 'little-seed-preschool'); ?></p>
            </div>
            <div class="final-cta__actions">
                <?php echo ls_render_button('Đăng ký tham quan trường', home_url('/school-tour/'), 'primary', 'calendar'); ?>
                <?php echo ls_render_button('Gọi tư vấn', 'tel:02870001122', 'secondary', 'phone'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_front_page(): void {
    ls_render_home_hero();
    ls_render_about_section();
    ls_render_why_choose_section();
    ls_render_program_tabs_section();
    ls_render_campus_section();
    ?>
    <section class="section section--soft" id="consultation">
        <div class="container section-grid section-grid--consultation">
            <div>
                <?php ls_render_section_title('Tư vấn', 'Ba mẹ cần tư vấn thêm?', 'Điền form để nhận tư vấn phù hợp theo độ tuổi, cơ sở và chương trình quan tâm.'); ?>
                <?php ls_render_consultation_form([
                    'context' => 'homepage',
                    'submit_label' => 'Nhận tư vấn ngay',
                ]); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-consultation-form-visual.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <?php
    ls_render_blog_section();
    ls_render_brochure_cta();
    ls_render_testimonial_section();
    ls_render_final_cta();
}

function ls_render_about_page(): void {
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Giới thiệu', 'url' => home_url('/gioi-thieu/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('Giới thiệu', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Câu chuyện thương hiệu Little Seed', 'little-seed-preschool'); ?></h1>
                <p>Little Seed ra đời từ mong muốn tạo nên một ngôi trường nơi trẻ được là chính mình, được khuyến khích tự lập và được lớn lên trong môi trường song ngữ ấm áp.</p>
                <?php echo ls_render_button('Đăng ký school tour', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-about-montessori-classroom.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white" id="story">
        <div class="container prose-grid">
            <div class="prose">
                <h2><?php esc_html_e('Little Seed được xây dựng từ điều gì?', 'little-seed-preschool'); ?></h2>
                <p>Thay vì cố gắng tạo ra một môi trường quá hoàn hảo, Little Seed chú trọng vào một lớp học thật sự hữu ích cho trẻ: có góc học tập rõ ràng, có vật liệu phù hợp, có thời gian để con tự thực hành và có giáo viên luôn quan sát chứ không áp đặt.</p>
                <p>Chúng tôi tin rằng mỗi ngày ở trường là một cơ hội để trẻ học cách tự quyết định, xử lý cảm xúc, giao tiếp tử tế và yêu thích việc học qua trải nghiệm.</p>
            </div>
            <div class="callout-box">
                <h3><?php esc_html_e('Điểm nhấn', 'little-seed-preschool'); ?></h3>
                <ul>
                    <li><?php esc_html_e('Montessori-inspired classroom', 'little-seed-preschool'); ?></li>
                    <li><?php esc_html_e('Bilingual immersion by nature', 'little-seed-preschool'); ?></li>
                    <li><?php esc_html_e('Whole-child care and nutrition', 'little-seed-preschool'); ?></li>
                    <li><?php esc_html_e('Teacher observation and partnership', 'little-seed-preschool'); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section section--soft" id="vision">
        <div class="container">
            <?php ls_render_section_title('Tầm nhìn', 'Tầm nhìn, sứ mệnh và giá trị', 'Ba mảng này giúp Little Seed giữ được nhịp phát triển cân bằng, nhất quán và bền vững.'); ?>
            <div class="card-grid card-grid--3">
                <article class="value-card">
                    <h3><?php esc_html_e('Tầm nhìn', 'little-seed-preschool'); ?></h3>
                    <p>Trở thành môi trường mầm non song ngữ được phụ huynh tin chọn vì sự tử tế, khoa học và khả năng hỗ trợ từng trẻ.</p>
                </article>
                <article class="value-card">
                    <h3><?php esc_html_e('Sứ mệnh', 'little-seed-preschool'); ?></h3>
                    <p>Nuôi dưỡng khả năng tự lập, cảm xúc tích cực và tư duy học tập chủ động để trẻ sẵn sàng cho chặng đường tiếp theo.</p>
                </article>
                <article class="value-card">
                    <h3><?php esc_html_e('Giá trị', 'little-seed-preschool'); ?></h3>
                    <p>An toàn, tôn trọng, quan sát, hợp tác và luôn đặt trải nghiệm của trẻ lên trước.</p>
                </article>
            </div>
        </div>
    </section>
    <section class="section section--white" id="team">
        <div class="container">
            <?php ls_render_section_title('Đội ngũ', 'Đội ngũ giáo viên và chuyên môn', 'Little Seed đầu tư vào đào tạo, quan sát và kết nối gia đình để việc học có chiều sâu.'); ?>
            <div class="card-grid card-grid--3">
                <?php foreach (ls_get_team_members() as $member) : ?>
                    <article class="team-card">
                        <?php echo ls_render_image($member['image'], ['class' => 'team-card__img']); ?>
                        <div class="team-card__body">
                            <h3><?php echo esc_html($member['name']); ?></h3>
                            <p class="eyebrow"><?php echo esc_html($member['role']); ?></p>
                            <p><?php echo esc_html($member['text']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section--cream" id="care">
        <div class="container section-grid section-grid--about">
            <div>
                <?php ls_render_section_title('Chăm sóc', 'Dinh dưỡng và chăm sóc cảm xúc', 'Mọi chi tiết trong bữa ăn, giấc ngủ và tương tác đều được tối ưu cho cảm giác an tâm của trẻ.'); ?>
                <div class="content-stack">
                    <p>Thực đơn của trường được lên theo nguyên tắc cân bằng, dễ ăn và linh hoạt theo độ tuổi. Giáo viên không chỉ nhắc trẻ ăn đủ, mà còn hỗ trợ các thói quen: rửa tay, dọn dẹp, ngồi đúng tư thế và lắng nghe cơ thể mình.</p>
                    <p>Các khoảnh khắc chuyển tiếp như đón trẻ, đổi hoạt động, chuẩn bị ăn hoặc ngủ đều được chuẩn bị chậm rãi để trẻ ít căng thẳng nhất có thể.</p>
                </div>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-care-nutrition-mealtime.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--final-cta">
        <div class="container final-cta">
            <div class="final-cta__copy">
                <p class="eyebrow"><?php esc_html_e('School tour', 'little-seed-preschool'); ?></p>
                <h2><?php esc_html_e('Muốn xem Little Seed ngoài đời thật?', 'little-seed-preschool'); ?></h2>
                <p><?php esc_html_e('Đăng ký school tour để quan sát lớp học, trò chuyện với tư vấn tuyển sinh và cảm nhận không khí của trường.', 'little-seed-preschool'); ?></p>
            </div>
            <div class="final-cta__actions">
                <?php echo ls_render_button('Đăng ký tham quan trường', home_url('/school-tour/'), 'primary', 'calendar'); ?>
                <?php echo ls_render_button('Xem chương trình', home_url('/chuong-trinh/'), 'secondary', 'arrow'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_method_page(): void {
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Phương pháp Montessori', 'url' => home_url('/phuong-phap-montessori/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('Phương pháp giáo dục', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Montessori-inspired learning tại Little Seed', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Tự lập, quan sát, học qua trải nghiệm và phát triển cảm xúc xã hội là nền tảng trong từng lớp học.', 'little-seed-preschool'); ?></p>
                <?php echo ls_render_button('Nhận tư vấn', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('curriculum-montessori-materials-closeup.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white" id="montessori">
        <div class="container prose-grid prose-grid--two">
            <div class="prose">
                <h2><?php esc_html_e('Montessori tại Little Seed hiểu đơn giản là gì?', 'little-seed-preschool'); ?></h2>
                <p>Montessori-inspired ở Little Seed không phải một bộ tuyên bố quá lớn. Nó là cách chúng tôi sắp lớp học, chọn vật liệu, tổ chức không gian và xây dựng nhịp học để con có thể tự làm, tự sửa, tự hoàn thành và tự tin hơn mỗi ngày.</p>
            </div>
            <div class="callout-box">
                <h3><?php esc_html_e('4 nguyên tắc', 'little-seed-preschool'); ?></h3>
                <ul>
                    <li><?php esc_html_e('Tự lập từng bước nhỏ', 'little-seed-preschool'); ?></li>
                    <li><?php esc_html_e('Quan sát thay vì áp đặt', 'little-seed-preschool'); ?></li>
                    <li><?php esc_html_e('Học qua trải nghiệm thực tế', 'little-seed-preschool'); ?></li>
                    <li><?php esc_html_e('Tôn trọng nhịp phát triển cá nhân', 'little-seed-preschool'); ?></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section section--soft" id="active-learning">
        <div class="container card-grid card-grid--3">
            <article class="value-card">
                <h3><?php esc_html_e('Học tập chủ động', 'little-seed-preschool'); ?></h3>
                <p><?php esc_html_e('Trẻ được chạm, thử, phân loại và lặp lại để hiểu sâu hơn thay vì chỉ nghe giảng.', 'little-seed-preschool'); ?></p>
            </article>
            <article class="value-card">
                <h3><?php esc_html_e('Tiếng Anh tự nhiên', 'little-seed-preschool'); ?></h3>
                <p><?php esc_html_e('Tiếng Anh trở thành một phần của hoạt động thường ngày, không tách rời cảm xúc của trẻ.', 'little-seed-preschool'); ?></p>
            </article>
            <article class="value-card">
                <h3><?php esc_html_e('Cảm xúc xã hội', 'little-seed-preschool'); ?></h3>
                <p><?php esc_html_e('Trẻ học cách chờ đến lượt, biểu đạt nhu cầu và hợp tác với bạn bè trong bối cảnh thật.', 'little-seed-preschool'); ?></p>
            </article>
        </div>
    </section>
    <section class="section section--cream" id="english">
        <div class="container section-grid section-grid--about">
            <div>
                <?php ls_render_section_title('Tiếng Anh', 'Tiếng Anh tự nhiên được đưa vào từng hoạt động', 'Không phải học thuộc. Con nghe, phản ứng, nhắc lại và dần sử dụng từ ngữ trong bối cảnh thật.'); ?>
                <div class="content-stack">
                    <p>Ở Little Seed, tiếng Anh không bị tách riêng thành một “môn học khó”. Thay vào đó, giáo viên đưa ngôn ngữ vào vòng tròn buổi sáng, hướng dẫn vật liệu, câu chuyện, bài hát và các tương tác hằng ngày. Cách này giúp trẻ cảm thấy ngôn ngữ là một phần của đời sống, không phải áp lực.</p>
                </div>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-english-circle-time.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white" id="social-emotional">
        <div class="container section-grid section-grid--about">
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-teacher-child-guidance.webp', 'image-frame--large'); ?>
            </div>
            <div>
                <?php ls_render_section_title('Cảm xúc xã hội', 'Chăm sóc cảm xúc và sự tự tin của trẻ', 'Khi trẻ cảm thấy an toàn và được tôn trọng, việc học sẽ tự nhiên và sâu hơn.'); ?>
                <p>Giáo viên Little Seed luôn cố gắng gọi tên cảm xúc, giúp trẻ biết cách bình tĩnh, xin hỗ trợ và quay lại hoạt động khi đã sẵn sàng. Sự đồng hành này tạo ra nền tảng tốt cho học tập, quan hệ bạn bè và thích nghi với môi trường mới.</p>
                <?php echo ls_render_button('Đăng ký tư vấn', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_tuition_page(): void {
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Học phí', 'url' => home_url('/hoc-phi/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('Học phí', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Học phí tham khảo demo', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Bảng bên dưới chỉ mang tính demo. Học phí thay đổi theo cơ sở, độ tuổi và chương trình học.', 'little-seed-preschool'); ?></p>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('tuition-consultation-parent-meeting.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container tuition-table-wrap">
            <table class="tuition-table">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Chương trình', 'little-seed-preschool'); ?></th>
                        <th><?php esc_html_e('Độ tuổi', 'little-seed-preschool'); ?></th>
                        <th><?php esc_html_e('Học phí tham khảo demo / tháng', 'little-seed-preschool'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Seedling Standard</td><td>12 tháng - 3 tuổi</td><td>Liên hệ tư vấn</td></tr>
                    <tr><td>Sprout Bilingual</td><td>18 tháng - 6 tuổi</td><td>Liên hệ tư vấn</td></tr>
                    <tr><td>Bloom Discovery</td><td>3 - 6 tuổi</td><td>Liên hệ tư vấn</td></tr>
                    <tr><td>Global Adventure</td><td>4 - 6 tuổi</td><td>Liên hệ tư vấn</td></tr>
                </tbody>
            </table>
            <p class="table-note"><?php esc_html_e('Học phí có thể thay đổi theo cơ sở và chính sách từng thời điểm. Vui lòng nhận bảng cập nhật từ Little Seed.', 'little-seed-preschool'); ?></p>
        </div>
    </section>
    <section class="section section--soft">
        <div class="container section-grid section-grid--consultation">
            <div>
                <?php ls_render_section_title('Nhận bảng học phí', 'Nhận chính sách học phí và ưu đãi tuyển sinh', 'Điền form để đội ngũ gửi bảng tư vấn phù hợp cho độ tuổi và cơ sở quan tâm.'); ?>
                <?php ls_render_consultation_form([
                    'context' => 'tuition',
                    'title' => 'Nhận học phí',
                    'submit_label' => 'Nhận học phí',
                ]); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-consultation-form-visual.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container">
            <?php ls_render_section_title('FAQ học phí', 'Câu hỏi thường gặp về học phí', 'Một số thắc mắc phổ biến trước khi ba mẹ nhận tư vấn chi tiết.'); ?>
            <div class="accordion" data-faq-accordion>
                <?php foreach (ls_get_faq_groups()[1]['items'] as $index => $item) : ?>
                    <details class="accordion__item">
                        <summary><?php echo esc_html($item['question']); ?></summary>
                        <div class="accordion__content"><p><?php echo esc_html($item['answer']); ?></p></div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_admissions_page(): void {
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Tuyển sinh', 'url' => home_url('/tuyen-sinh/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('Tuyển sinh', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Quy trình tuyển sinh 4 bước rõ ràng', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Little Seed giữ quy trình minh bạch, dễ theo dõi để phụ huynh luôn biết mình đang ở bước nào.', 'little-seed-preschool'); ?></p>
                <?php echo ls_render_button('Đăng ký school tour', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('admissions-school-tour-family.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white" id="process">
        <div class="container">
            <?php ls_render_section_title('Quy trình', 'Tuyển sinh theo 4 bước', 'Mỗi bước đều ngắn gọn, có hướng dẫn và không gây áp lực cho gia đình.'); ?>
            <div class="process-grid">
                <?php foreach (ls_get_process_steps() as $step) : ?>
                    <article class="process-card">
                        <span class="process-card__step"><?php echo esc_html($step['step']); ?></span>
                        <h3><?php echo esc_html($step['title']); ?></h3>
                        <p><?php echo esc_html($step['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section--cream">
        <div class="container section-grid section-grid--consultation">
            <div>
                <?php ls_render_section_title('CTA mạnh', 'Nhận tư vấn trước khi đăng ký', 'Gửi form để Little Seed gọi lại và gợi ý lộ trình phù hợp cho bé.'); ?>
                <?php ls_render_consultation_form([
                    'context' => 'admissions',
                    'title' => 'Đăng ký tuyển sinh',
                    'submit_label' => 'Nhận tư vấn tuyển sinh',
                ]); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-consultation-form-visual.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_school_tour_page(): void {
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'School Tour', 'url' => home_url('/school-tour/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('School tour', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Đăng ký school tour cùng Little Seed', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Đây là landing page ngắn gọn để ba mẹ gửi lịch tham quan, chọn cơ sở quan tâm và nhận phản hồi từ trường.', 'little-seed-preschool'); ?></p>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('admissions-school-tour-family.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container section-grid section-grid--consultation">
            <div>
                <?php ls_render_section_title('Đăng ký nhanh', 'Chỉ cần để lại thông tin cơ bản', 'Form ngắn, rõ ràng, không làm ba mẹ mất thời gian.'); ?>
                <?php ls_render_consultation_form([
                    'context' => 'school-tour',
                    'title' => 'Đăng ký school tour',
                    'submit_label' => 'Gửi lịch tham quan',
                    'show_brochure' => false,
                ]); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-campus-playground.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_faq_page(): void {
    $groups = ls_get_faq_groups();
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'FAQ', 'url' => home_url('/faq/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('FAQ', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Câu hỏi thường gặp', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Các câu hỏi được nhóm theo chủ đề để phụ huynh tìm thông tin nhanh hơn.', 'little-seed-preschool'); ?></p>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('faq-parent-support-meeting.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container">
            <?php foreach ($groups as $group) : ?>
                <div class="faq-group">
                    <h2><?php echo esc_html($group['title']); ?></h2>
                    <div class="accordion" data-faq-accordion>
                        <?php foreach ($group['items'] as $item) : ?>
                            <details class="accordion__item">
                                <summary><?php echo esc_html($item['question']); ?></summary>
                                <div class="accordion__content"><p><?php echo esc_html($item['answer']); ?></p></div>
                            </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function ls_render_contact_page(): void {
    $campuses = ls_get_campuses_data();
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Liên hệ', 'url' => home_url('/lien-he/')],
                ]); ?>
                <p class="eyebrow"><?php esc_html_e('Liên hệ', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Liên hệ Little Seed', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Gửi form, gọi hotline hoặc chọn cơ sở để đội ngũ tư vấn phản hồi nhanh nhất.', 'little-seed-preschool'); ?></p>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('contact-support-hotline-visual.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container section-grid section-grid--consultation">
            <div>
                <?php ls_render_section_title('Tư vấn liên hệ', 'Gửi yêu cầu cho Little Seed', 'Form contact vẫn dùng chung xử lý AJAX an toàn và demo lưu nội bộ.'); ?>
                <?php ls_render_contact_form(); ?>
            </div>
            <div class="section-grid__media">
                <div class="contact-cards">
                    <?php foreach ($campuses as $campus) : ?>
                        <article class="contact-card">
                            <h3><?php echo esc_html($campus['title']); ?></h3>
                            <p><?php echo esc_html($campus['address']); ?></p>
                            <p><?php echo esc_html($campus['hotline']); ?></p>
                            <?php echo ls_render_button('Đăng ký tham quan', home_url('/school-tour/'), 'secondary', 'calendar'); ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section section--soft">
        <div class="container">
            <div class="map-placeholder">
                <p class="eyebrow"><?php esc_html_e('Map placeholder', 'little-seed-preschool'); ?></p>
                <h2><?php esc_html_e('Bản đồ demo không nhúng map thật nếu chưa có API', 'little-seed-preschool'); ?></h2>
                <p><?php esc_html_e('Khu vực này được giữ làm placeholder để sau này có thể thay bằng bản đồ thật hoặc iframe tương thích.', 'little-seed-preschool'); ?></p>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_program_archive_page(): void {
    $programs = ls_get_programs_data();
    $age_filter = isset($_GET['age']) ? sanitize_text_field(wp_unslash($_GET['age'])) : '';
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <p class="eyebrow"><?php esc_html_e('Chương trình học', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Khám phá chương trình học tại Little Seed', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Lọc theo độ tuổi để xem nhanh chương trình phù hợp nhất cho bé.', 'little-seed-preschool'); ?></p>
                <div class="filter-chips" data-program-filter>
                    <a class="filter-chip<?php echo $age_filter === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url(remove_query_arg('age')); ?>"><?php esc_html_e('Tất cả', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $age_filter === '12' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('age', '12')); ?>"><?php esc_html_e('12 tháng - 3 tuổi', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $age_filter === '18' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('age', '18')); ?>"><?php esc_html_e('18 tháng - 6 tuổi', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $age_filter === '3' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('age', '3')); ?>"><?php esc_html_e('3 - 6 tuổi', 'little-seed-preschool'); ?></a>
                </div>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-program-tabs-children.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container">
            <div class="card-grid card-grid--2">
                <?php foreach ($programs as $program) : ?>
                    <?php if ($age_filter === '12' && strpos($program['age'], '12') === false) { continue; } ?>
                    <?php if ($age_filter === '18' && strpos($program['age'], '18') === false) { continue; } ?>
                    <?php if ($age_filter === '3' && strpos($program['age'], '3 - 6') === false && strpos($program['age'], '4 - 6') === false) { continue; } ?>
                    <?php ls_render_program_card($program); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section--cream">
        <div class="container section-cta-inline">
            <div>
                <h2><?php esc_html_e('Ba mẹ muốn nhận học phí theo chương trình?', 'little-seed-preschool'); ?></h2>
                <p><?php esc_html_e('Gửi form để Little Seed tư vấn nhanh hơn theo cơ sở và độ tuổi.', 'little-seed-preschool'); ?></p>
            </div>
            <?php echo ls_render_button('Nhận học phí', home_url('/hoc-phi/'), 'primary', 'calendar'); ?>
        </div>
    </section>
    <?php
}

function ls_render_campus_archive_page(): void {
    $campuses = ls_get_campuses_data();
    $region_filter = isset($_GET['region']) ? sanitize_text_field(wp_unslash($_GET['region'])) : '';
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <p class="eyebrow"><?php esc_html_e('Cơ sở', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Danh sách cơ sở Little Seed', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Lọc theo khu vực để xem cơ sở thuận tiện cho gia đình bạn.', 'little-seed-preschool'); ?></p>
                <div class="filter-chips">
                    <a class="filter-chip<?php echo $region_filter === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url(remove_query_arg('region')); ?>"><?php esc_html_e('Tất cả', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $region_filter === 'Quận 2' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('region', 'Quận 2')); ?>"><?php esc_html_e('Quận 2', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $region_filter === 'Quận 7' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('region', 'Quận 7')); ?>"><?php esc_html_e('Quận 7', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $region_filter === 'Bình Thạnh' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('region', 'Bình Thạnh')); ?>"><?php esc_html_e('Bình Thạnh', 'little-seed-preschool'); ?></a>
                </div>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('branches-campus-card-visual.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container card-grid card-grid--3">
            <?php foreach ($campuses as $campus) : ?>
                <?php if ($region_filter !== '' && $campus['region'] !== $region_filter) { continue; } ?>
                <?php ls_render_campus_card($campus); ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
}

function ls_render_news_archive_page(): void {
    $category = isset($_GET['category']) ? sanitize_text_field(wp_unslash($_GET['category'])) : '';
    $search = isset($_GET['s']) ? sanitize_text_field(wp_unslash($_GET['s'])) : '';
    $query_args = [
        'post_type' => 'ls_news',
        'post_status' => 'publish',
        'posts_per_page' => 12,
    ];
    if ($search !== '') {
        $query_args['s'] = $search;
    }
    if ($category !== '') {
        $query_args['category_name'] = sanitize_title($category);
    }
    $query = new WP_Query($query_args);
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <p class="eyebrow"><?php esc_html_e('Tin tức', 'little-seed-preschool'); ?></p>
                <h1><?php esc_html_e('Tin tức và chia sẻ dành cho phụ huynh', 'little-seed-preschool'); ?></h1>
                <p><?php esc_html_e('Tìm theo từ khóa đơn giản hoặc lọc theo danh mục.', 'little-seed-preschool'); ?></p>
                <form class="archive-search" method="get">
                    <input type="search" name="s" value="<?php echo esc_attr($search); ?>" placeholder="<?php esc_attr_e('Tìm bài viết', 'little-seed-preschool'); ?>">
                    <button class="button button--secondary" type="submit"><?php esc_html_e('Tìm kiếm', 'little-seed-preschool'); ?></button>
                </form>
                <div class="filter-chips">
                    <a class="filter-chip<?php echo $category === '' ? ' is-active' : ''; ?>" href="<?php echo esc_url(remove_query_arg(['category'])); ?>"><?php esc_html_e('Tất cả', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $category === 'Montessori' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('category', 'Montessori')); ?>"><?php esc_html_e('Montessori', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $category === 'Song ngữ' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('category', 'Song ngữ')); ?>"><?php esc_html_e('Song ngữ', 'little-seed-preschool'); ?></a>
                    <a class="filter-chip<?php echo $category === 'Tuyển sinh' ? ' is-active' : ''; ?>" href="<?php echo esc_url(add_query_arg('category', 'Tuyển sinh')); ?>"><?php esc_html_e('Tuyển sinh', 'little-seed-preschool'); ?></a>
                </div>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('blog-montessori-independence-thumbnail.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container">
            <div class="card-grid card-grid--3">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <?php ls_render_blog_card(get_post()); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <p><?php esc_html_e('Không tìm thấy bài viết phù hợp.', 'little-seed-preschool'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_program_single_page(): void {
    $post_id = get_queried_object_id();
    $slug = get_post_field('post_name', $post_id);
    $map = ls_get_program_page_map();
    $data = $map[$slug] ?? [];
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Chương trình', 'url' => home_url('/chuong-trinh/')],
                    ['name' => get_the_title($post_id), 'url' => get_permalink($post_id)],
                ]); ?>
                <p class="eyebrow"><?php echo esc_html($data['age'] ?? get_post_meta($post_id, '_ls_program_age', true)); ?></p>
                <h1><?php echo esc_html(get_the_title($post_id)); ?></h1>
                <p><?php echo esc_html($data['excerpt'] ?? get_the_excerpt($post_id)); ?></p>
                <?php echo ls_render_button('Đăng ký school tour', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame($data['image'] ?? 'homepage-program-tabs-children.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container prose-grid prose-grid--two">
            <div class="prose">
                <h2><?php esc_html_e('Mục tiêu chương trình', 'little-seed-preschool'); ?></h2>
                <p><?php echo esc_html($data['goal'] ?? 'Mục tiêu chương trình được thiết kế theo độ tuổi và nhịp phát triển của trẻ.'); ?></p>
                <h2><?php esc_html_e('Một ngày học của bé', 'little-seed-preschool'); ?></h2>
                <ul>
                    <?php foreach (($data['day'] ?? []) as $item) : ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="callout-box">
                <h3><?php esc_html_e('Điểm nổi bật', 'little-seed-preschool'); ?></h3>
                <?php ls_render_feature_list($data['highlights'] ?? []); ?>
            </div>
        </div>
    </section>
    <section class="section section--soft">
        <div class="container">
            <h2 class="section-title__plain"><?php esc_html_e('FAQ nhỏ', 'little-seed-preschool'); ?></h2>
            <div class="accordion" data-faq-accordion>
                <?php foreach (($data['faq'] ?? []) as $item) : ?>
                    <details class="accordion__item">
                        <summary><?php echo esc_html($item['question']); ?></summary>
                        <div class="accordion__content"><p><?php echo esc_html($item['answer']); ?></p></div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section--final-cta">
        <div class="container final-cta">
            <div class="final-cta__copy">
                <p class="eyebrow"><?php esc_html_e('School tour', 'little-seed-preschool'); ?></p>
                <h2><?php esc_html_e('Đặt lịch tham quan để xem lớp học phù hợp', 'little-seed-preschool'); ?></h2>
            </div>
            <?php echo ls_render_button('Đăng ký tham quan', home_url('/school-tour/'), 'primary', 'calendar'); ?>
        </div>
    </section>
    <?php
}

function ls_render_campus_single_page(): void {
    $post_id = get_queried_object_id();
    $slug = get_post_field('post_name', $post_id);
    $map = ls_get_campus_page_map();
    $data = $map[$slug] ?? [];
    ?>
    <section class="section section--hero-small">
        <div class="container section-grid section-grid--about page-hero">
            <div>
                <?php ls_render_breadcrumbs([
                    ['name' => 'Trang chủ', 'url' => home_url('/')],
                    ['name' => 'Cơ sở', 'url' => home_url('/co-so/')],
                    ['name' => get_the_title($post_id), 'url' => get_permalink($post_id)],
                ]); ?>
                <p class="eyebrow"><?php echo esc_html($data['region'] ?? 'Cơ sở'); ?></p>
                <h1><?php echo esc_html(get_the_title($post_id)); ?></h1>
                <p><?php echo esc_html(get_the_excerpt($post_id)); ?></p>
                <?php echo ls_render_button('Đăng ký tham quan', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame($data['image'] ?? 'branches-campus-card-visual.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <section class="section section--white">
        <div class="container prose-grid prose-grid--two">
            <div class="prose">
                <h2><?php esc_html_e('Thông tin cơ sở', 'little-seed-preschool'); ?></h2>
                <ul>
                    <li><?php echo esc_html($data['address'] ?? get_the_excerpt($post_id)); ?></li>
                    <li><?php echo esc_html($data['hotline'] ?? '028 7000 1122'); ?></li>
                    <li><?php echo esc_html($data['hours'] ?? '08:00 - 17:30'); ?></li>
                </ul>
                <h2><?php esc_html_e('Cơ sở vật chất', 'little-seed-preschool'); ?></h2>
                <?php ls_render_feature_list($data['features'] ?? []); ?>
            </div>
            <div class="gallery-grid">
                <?php foreach (($data['gallery'] ?? []) as $image) : ?>
                    <?php echo ls_render_image($image, ['class' => 'gallery-grid__img']); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section section--soft">
        <div class="container">
            <?php ls_render_section_title('Lịch tour', 'Lịch school tour demo linh hoạt', 'Ba mẹ có thể chọn khung giờ tư vấn phù hợp.'); ?>
            <div class="card-grid card-grid--3">
                <article class="value-card"><h3>Thứ 2 - Thứ 6</h3><p>08:30 - 10:30</p></article>
                <article class="value-card"><h3>Thứ 7</h3><p>09:00 - 11:00</p></article>
                <article class="value-card"><h3>Hẹn riêng</h3><p>Theo lịch tư vấn của gia đình</p></article>
            </div>
        </div>
    </section>
    <section class="section section--cream">
        <div class="container section-grid section-grid--consultation">
            <div>
                <?php ls_render_section_title('Đăng ký tham quan', 'Điền form để đặt lịch tham quan cơ sở', 'Form ngắn và đi thẳng vào nhu cầu chọn cơ sở của gia đình.'); ?>
                <?php ls_render_consultation_form([
                    'context' => 'campus',
                    'title' => 'Đăng ký tham quan',
                    'submit_label' => 'Đặt lịch tham quan',
                ]); ?>
            </div>
            <div class="section-grid__media">
                <?php ls_render_image_frame('homepage-campus-playground.webp', 'image-frame--large'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_news_single_page(): void {
    $post_id = get_queried_object_id();
    $image = 'blog-montessori-independence-thumbnail.webp';
    foreach (ls_get_blog_posts_data() as $candidate) {
        if ($candidate['slug'] === get_post_field('post_name', $post_id)) {
            $image = $candidate['image'];
            break;
        }
    }
    $related = get_posts([
        'post_type' => 'ls_news',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'post__not_in' => [$post_id],
    ]);
    ?>
    <article class="single-article">
        <div class="container container--narrow">
            <?php ls_render_breadcrumbs([
                ['name' => 'Trang chủ', 'url' => home_url('/')],
                ['name' => 'Tin tức', 'url' => home_url('/tin-tuc/')],
                ['name' => get_the_title($post_id), 'url' => get_permalink($post_id)],
            ]); ?>
            <p class="eyebrow"><?php echo esc_html(get_the_date('d/m/Y', $post_id)); ?></p>
            <h1><?php echo esc_html(get_the_title($post_id)); ?></h1>
            <p class="single-article__excerpt"><?php echo esc_html(get_the_excerpt($post_id)); ?></p>
            <div class="single-article__media">
                <?php ls_render_image_frame($image, 'image-frame--large'); ?>
            </div>
            <div class="prose">
                <?php echo apply_filters('the_content', get_post_field('post_content', $post_id)); ?>
            </div>
            <div class="single-article__cta">
                <?php echo ls_render_button('Nhận tư vấn', home_url('/school-tour/'), 'primary', 'calendar'); ?>
            </div>
        </div>
        <section class="section section--soft">
            <div class="container">
                <?php ls_render_section_title('Bài viết liên quan', 'Đọc thêm những nội dung hữu ích', 'Các bài được chọn từ cùng nhóm demo.'); ?>
                <div class="card-grid card-grid--3">
                    <?php foreach ($related as $post) : ?>
                        <?php ls_render_blog_card($post); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </article>
    <?php
}

function ls_render_404_page(): void {
    ?>
    <section class="section section--hero-small">
        <div class="container not-found">
            <p class="eyebrow">404</p>
            <h1><?php esc_html_e('Trang bạn tìm không tồn tại', 'little-seed-preschool'); ?></h1>
            <p><?php esc_html_e('Có thể đường dẫn đã thay đổi hoặc trang chưa được tạo. Hãy quay về trang chủ hoặc xem chương trình học.', 'little-seed-preschool'); ?></p>
            <div class="card-actions">
                <?php echo ls_render_button('Về trang chủ', home_url('/'), 'primary', 'arrow'); ?>
                <?php echo ls_render_button('Xem chương trình', home_url('/chuong-trinh/'), 'secondary', 'arrow'); ?>
            </div>
        </div>
    </section>
    <?php
}

function ls_render_default_index(): void {
    if (is_home()) {
        ls_render_news_archive_page();
        return;
    }
    ?>
    <section class="section section--hero-small">
        <div class="container not-found">
            <p class="eyebrow"><?php esc_html_e('Little Seed', 'little-seed-preschool'); ?></p>
            <h1><?php esc_html_e('Demo theme đã sẵn sàng', 'little-seed-preschool'); ?></h1>
            <p><?php esc_html_e('Trang này là fallback khi WordPress không tìm được template phù hợp.', 'little-seed-preschool'); ?></p>
        </div>
    </section>
    <?php
}

function ls_render_page_template(): void {
    $slug = get_post_field('post_name', get_queried_object_id());
    switch ($slug) {
        case 'gioi-thieu':
            ls_render_about_page();
            break;
        case 'phuong-phap-montessori':
            ls_render_method_page();
            break;
        case 'hoc-phi':
            ls_render_tuition_page();
            break;
        case 'tuyen-sinh':
            ls_render_admissions_page();
            break;
        case 'school-tour':
            ls_render_school_tour_page();
            break;
        case 'faq':
            ls_render_faq_page();
            break;
        case 'lien-he':
            ls_render_contact_page();
            break;
        default:
            ?>
            <section class="section section--hero-small">
                <div class="container not-found">
                    <h1><?php echo esc_html(get_the_title()); ?></h1>
                    <div class="prose"><?php the_content(); ?></div>
                </div>
            </section>
            <?php
            break;
    }
}

function ls_render_single_template(): void {
    if (is_singular('ls_program')) {
        ls_render_program_single_page();
        return;
    }
    if (is_singular('ls_campus')) {
        ls_render_campus_single_page();
        return;
    }
    if (is_singular('ls_news')) {
        ls_render_news_single_page();
        return;
    }
    ?>
    <section class="section section--hero-small">
        <div class="container container--narrow prose">
            <h1><?php echo esc_html(get_the_title()); ?></h1>
            <?php the_content(); ?>
        </div>
    </section>
    <?php
}

function ls_render_archive_template(): void {
    if (is_post_type_archive('ls_program')) {
        ls_render_program_archive_page();
        return;
    }
    if (is_post_type_archive('ls_campus')) {
        ls_render_campus_archive_page();
        return;
    }
    if (is_post_type_archive('ls_news') || is_home()) {
        ls_render_news_archive_page();
        return;
    }
    ?>
    <section class="section section--hero-small">
        <div class="container">
            <h1><?php esc_html_e('Archive', 'little-seed-preschool'); ?></h1>
        </div>
    </section>
    <?php
}
