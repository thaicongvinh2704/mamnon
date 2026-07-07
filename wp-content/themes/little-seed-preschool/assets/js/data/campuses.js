import { getImage } from './images.js';

export const campuses = [
  {
    slug: 'quan-2',
    title: 'Little Seed Quận 2',
    region: 'Quận 2',
    address: '18 Đường Số 12, Phường An Phú, TP. Thủ Đức',
    hotline: '028 7000 1122 ext. 201',
    hours: '08:00 - 17:30',
    image: getImage('branches-campus-card-visual.webp'),
  },
  {
    slug: 'quan-7',
    title: 'Little Seed Quận 7',
    region: 'Quận 7',
    address: '102 Nguyễn Lương Bằng, Phường Tân Phú, Quận 7',
    hotline: '028 7000 1122 ext. 202',
    hours: '08:00 - 17:30',
    image: getImage('homepage-campus-playground.webp'),
  },
  {
    slug: 'binh-thanh',
    title: 'Little Seed Bình Thạnh',
    region: 'Bình Thạnh',
    address: '56 Võ Oanh, Phường 25, Bình Thạnh',
    hotline: '028 7000 1122 ext. 203',
    hours: '08:00 - 17:30',
    image: getImage('campus-library-reading-corner.webp'),
  },
];

