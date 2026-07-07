import { getImage } from './images.js';

export const blogPosts = [
  {
    title: 'Vì sao trẻ mầm non cần học cách tự lập?',
    slug: 'vi-sao-tre-mam-non-can-hoc-cach-tu-lap',
    category: 'Montessori',
    date: '2026-06-12',
    excerpt: 'Tự lập là nền móng giúp trẻ tự tin, biết chờ đợi và xử lý những việc nhỏ trong ngày học.',
    image: getImage('blog-montessori-independence-thumbnail.webp'),
  },
  {
    title: 'Cách giúp con yêu thích tiếng Anh tự nhiên',
    slug: 'cach-giup-con-yeu-thich-tieng-anh-tu-nhien',
    category: 'Song ngữ',
    date: '2026-06-03',
    excerpt: 'Tiếng Anh hiệu quả nhất ở lứa mầm non thường đến từ trải nghiệm, lặp lại và cảm xúc tích cực.',
    image: getImage('blog-child-language-development-thumbnail.webp'),
  },
  {
    title: 'Checklist chọn trường mầm non an toàn cho bé',
    slug: 'checklist-chon-truong-mam-non-an-toan-cho-be',
    category: 'Tuyển sinh',
    date: '2026-05-26',
    excerpt: 'Một danh sách ngắn để phụ huynh quan sát lớp học, bữa ăn và quy trình đón trả trẻ.',
    image: getImage('faq-parent-support-meeting.webp'),
  },
];

