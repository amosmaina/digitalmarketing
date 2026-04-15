<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'title' => 'Branding & Logo Design',
                'description' => 'Create a unique identity that resonates with your audience.',
                'content' => 'Our branding and logo design services focus on creating a visual language that tells your brand\'s story. From color palettes to typography and iconic logos, we ensure your business stands out in a crowded market. We provide comprehensive brand guidelines to maintain consistency across all platforms.',
                'image' => 'https://images.unsplash.com/photo-1572044162444-ad60f128bdea?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Custom Logo Concepts', 'Brand Style Guides', 'Social Media Kits', 'Stationery Design'],
            ],
            [
                'title' => 'SEO Optimization',
                'description' => 'Boost your search rankings and drive organic traffic.',
                'content' => 'Search Engine Optimization is more than just keywords. We perform deep technical audits, competitor analysis, and content optimization to ensure your website ranks where it matters. Our goal is to drive high-quality organic traffic that converts into loyal customers.',
                'image' => 'https://images.unsplash.com/photo-1562577309-4932fdd64cd1?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Keyword Research', 'Technical SEO Audit', 'Backlink Building', 'On-Page Optimization'],
            ],
            [
                'title' => 'Web Development & Design',
                'description' => 'Modern, responsive websites built for performance.',
                'content' => 'We build fast, secure, and user-friendly websites that look great on any device. Whether it\'s a custom-built web application or a high-converting landing page, our development team uses the latest technologies to bring your vision to life.',
                'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Responsive Design', 'Custom CMS Solutions', 'E-commerce Integration', 'Performance Tuning'],
            ],
            [
                'title' => 'AI and Automation',
                'description' => 'Streamline your workflows with intelligent solutions.',
                'content' => 'Harness the power of Artificial Intelligence to automate repetitive tasks and gain deeper insights from your data. From chatbots to predictive analytics, we help you implement AI solutions that improve efficiency and reduce costs.',
                'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Custom AI Chatbots', 'Workflow Automation', 'Predictive Modeling', 'NLP Solutions'],
            ],
            [
                'title' => 'Consulting and Licensing',
                'description' => 'Expert guidance for your digital transformation.',
                'content' => 'Our consulting services help you navigate the complex digital landscape. We provide strategic advice on software licensing, technology stacks, and digital transformation roadmaps to ensure your business is future-proof.',
                'image' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Strategic Planning', 'Software Compliance', 'Tech Stack Audit', 'Change Management'],
            ],
            [
                'title' => 'Data Analysis',
                'description' => 'Turn your data into actionable business insights.',
                'content' => 'We help you make sense of your data. Our analysis services uncover hidden patterns and trends, providing you with the intelligence needed to make informed business decisions and stay ahead of the competition.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Data Visualization', 'Statistical Analysis', 'Market Trend Insights', 'Custom Dashboards'],
            ],
            [
                'title' => 'Digital Marketing',
                'description' => 'Grow your audience and increase conversions.',
                'content' => 'Our digital marketing strategies are designed to reach your target audience at the right time. We manage everything from PPC campaigns to social media marketing, ensuring your brand message is heard loud and clear.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['PPC Advertising', 'Social Media Strategy', 'Email Marketing', 'Content Strategy'],
            ],
            [
                'title' => 'Database Management',
                'description' => 'Secure, scalable, and high-performance database solutions.',
                'content' => 'We design and maintain robust database architectures that ensure your data is always available and secure. From optimization to migration, our database experts handle all aspects of your data infrastructure.',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?q=80&w=1200&h=800&auto=format&fit=crop',
                'features' => ['Database Optimization', 'Cloud Migrations', 'Security Audits', 'Backup & Recovery'],
            ],
        ];

        foreach ($services as $s) {
            Service::create([
                'title' => $s['title'],
                'slug' => Str::slug($s['title']),
                'description' => $s['description'],
                'content' => $s['content'],
                'image' => $s['image'],
                'features' => $s['features'],
                'brochure_template' => 'default_brochure'
            ]);
        }
    }
}
