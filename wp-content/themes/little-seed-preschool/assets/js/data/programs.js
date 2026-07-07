import { getImage } from './images.js';

export const programs = [
  {
    slug: 'seedling-standard',
    title: 'Seedling Standard',
    age: '12 tháng - 3 tuổi',
    excerpt: 'Nền tảng ấm áp cho trẻ bắt đầu hành trình tự lập, cảm xúc an toàn và sinh hoạt ổn định.',
    image: getImage('program-toddler-standard-classroom.webp'),
    highlights: [
      'Môi trường chuẩn bị theo nhu cầu lứa tuổi',
      'Practical life và cảm giác tự phục vụ',
      'Giáo viên theo sát từng bước chuyển tiếp',
      'Nhật ký học tập gửi về gia đình',
    ],
  },
  {
    slug: 'sprout-bilingual',
    title: 'Sprout Bilingual',
    age: '18 tháng - 6 tuổi',
    excerpt: 'Chương trình song ngữ nhẹ nhàng giúp trẻ làm quen tiếng Anh tự nhiên mỗi ngày.',
    image: getImage('program-bilingual-explore-class.webp'),
    highlights: [
      'Tiếp xúc tiếng Anh tự nhiên',
      'Vòng tròn, trò chơi và phản xạ ngôn ngữ',
      'Nhóm nhỏ với giáo viên đồng hành',
      'Hoạt động gắn với vật thật và hành động',
    ],
  },
  {
    slug: 'bloom-discovery',
    title: 'Bloom Discovery',
    age: '3 - 6 tuổi',
    excerpt: 'Học qua dự án, nghệ thuật và khoa học nhỏ để khơi dậy tinh thần khám phá.',
    image: getImage('program-discover-project-learning.webp'),
    highlights: [
      'Dự án sáng tạo theo chủ đề',
      'Tăng cường quan sát và diễn đạt',
      'Làm việc độc lập và hợp tác nhóm',
      'Phản hồi định kỳ theo tiến trình',
    ],
  },
  {
    slug: 'global-adventure',
    title: 'Global Adventure',
    age: '4 - 6 tuổi',
    excerpt: 'Mở rộng tiếng Anh, tư duy và sự tự tin cho giai đoạn chuẩn bị vào lớp 1.',
    image: getImage('program-adventure-international-english.webp'),
    highlights: [
      'English immersion moments',
      'Thuyết trình và kể chuyện',
      'STEM mini-labs và dự án nhóm',
      'Lộ trình sẵn sàng tiểu học',
    ],
  },
];

