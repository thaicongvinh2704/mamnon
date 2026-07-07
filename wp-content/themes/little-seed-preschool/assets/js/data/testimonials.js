import { getImage } from './images.js';

export const testimonials = {
  parent: [
    {
      name: 'Chị Hằng',
      role: 'Phụ huynh bé Mia, 4 tuổi',
      quote: 'Điều mình thích nhất là con biết tự chuẩn bị đồ dùng và hào hứng kể lại hoạt động ở lớp. Bé tự tin hơn nhiều.',
      avatar: getImage('student-portrait-confident-child.webp'),
    },
    {
      name: 'Anh Nam',
      role: 'Phụ huynh bé Leo, 3 tuổi',
      quote: 'Trường phản hồi rất rõ ràng, từng bữa ăn và giấc ngủ đều được cập nhật. Gia đình mình thấy yên tâm.',
      avatar: getImage('homepage-parent-testimonial-conversation.webp'),
    },
  ],
  teacher: [
    {
      name: 'Cô Mai',
      role: 'Lead teacher',
      quote: 'Little Seed tạo không gian để giáo viên quan sát sâu hơn thay vì chỉ chạy theo bài học. Trẻ tiến bộ theo nhịp riêng.',
      avatar: getImage('trust-teachers-team-group.webp'),
    },
    {
      name: 'Cô Trâm',
      role: 'English guide',
      quote: 'Tiếng Anh ở đây là trải nghiệm thật. Trẻ lặp lại trong ngữ cảnh nên rất tự nhiên và không bị áp lực.',
      avatar: getImage('trust-teacher-training-workshop.webp'),
    },
  ],
};

