<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\PortfolioProject;
use App\Models\Post;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdditionalPortfolioProjects();
        $this->createBlogPosts();
        $this->createContactMessages();
    }

    private function createAdditionalPortfolioProjects(): void
    {
        $categories = Term::where('taxonomy', 'portfolio_category')->get();

        $projects = [
            [
                'title' => 'Highway 101 Expansion',
                'description' => 'Major highway expansion project improving traffic flow and safety.',
                'content' => '<p>This infrastructure project involved expanding a 5-mile section of Highway 101, including new interchange designs and improved safety features.</p><p>The project required extensive coordination with environmental agencies and community stakeholders.</p>',
                'client_name' => 'State Highway Department',
                'location' => 'San Jose, CA',
                'project_value' => 35000000.00,
                'start_date' => '2021-09-01',
                'completion_date' => '2023-12-15',
                'is_active' => true,
                'priority' => 4,
                'category_id' => $categories->where('slug', 'infrastructure')->first()?->id,
                'technologies' => ['AutoCAD Civil 3D', 'Bentley InRoads', 'ArcGIS'],
            ],
            [
                'title' => 'Sunset Apartments',
                'description' => 'Affordable housing project with 80 units and community facilities.',
                'content' => '<p>This residential development focuses on providing quality affordable housing with modern amenities and sustainable design features.</p>',
                'client_name' => 'Sunset Housing Authority',
                'location' => 'Sacramento, CA',
                'project_value' => 18000000.00,
                'start_date' => '2022-05-01',
                'completion_date' => '2024-03-30',
                'is_active' => true,
                'priority' => 5,
                'category_id' => $categories->where('slug', 'residential')->first()?->id,
                'technologies' => ['Revit', 'ETABS', 'Green Building Studio'],
            ],
            [
                'title' => 'Tech Campus Phase II',
                'description' => 'Expansion of a major technology campus with innovative structural design.',
                'content' => '<p>The second phase of a growing technology campus featuring open-plan offices, collaborative spaces, and advanced building systems.</p>',
                'client_name' => 'TechCorp Industries',
                'location' => 'Palo Alto, CA',
                'project_value' => 52000000.00,
                'start_date' => '2023-01-01',
                'completion_date' => '2024-08-30',
                'is_active' => true,
                'priority' => 6,
                'category_id' => $categories->where('slug', 'commercial')->first()?->id,
                'technologies' => ['Tekla Structures', 'SAP2000', 'BIM 360'],
            ],
            [
                'title' => 'Riverside Pedestrian Bridge',
                'description' => 'Modern pedestrian bridge connecting two urban districts.',
                'content' => '<p>An architecturally striking pedestrian bridge featuring cable-stayed design and integrated lighting systems.</p>',
                'client_name' => 'City of Riverside',
                'location' => 'Riverside, CA',
                'project_value' => 8500000.00,
                'start_date' => '2022-03-15',
                'completion_date' => '2023-10-20',
                'is_active' => true,
                'priority' => 7,
                'category_id' => $categories->where('slug', 'bridges')->first()?->id,
                'technologies' => ['CSiBridge', 'Rhino 3D', 'Grasshopper'],
            ],
        ];

        foreach ($projects as $data) {
            $technologies = $data['technologies'];
            unset($data['technologies']);

            $project = PortfolioProject::create($data);
            $project->technologies = $technologies;
            $project->save();
        }
    }

    private function createBlogPosts(): void
    {
        $user = User::first(); // Assuming there's at least one user
        if (!$user) return;

        // Create blog categories if they don't exist
        $blogCategories = [
            ['name' => 'Engineering Insights', 'slug' => 'engineering-insights'],
            ['name' => 'Project Management', 'slug' => 'project-management'],
            ['name' => 'Industry News', 'slug' => 'industry-news'],
            ['name' => 'Sustainability', 'slug' => 'sustainability'],
        ];

        foreach ($blogCategories as $category) {
            Term::firstOrCreate([
                'slug' => $category['slug'],
                'taxonomy' => 'category'
            ], [
                'name' => $category['name'],
                'description' => 'Blog category for ' . strtolower($category['name']),
            ]);
        }

        $categories = Term::where('taxonomy', 'category')->get();

        $posts = [
            [
                'title' => 'The Future of Sustainable Construction',
                'slug' => 'future-sustainable-construction',
                'excerpt' => 'Exploring innovative materials and techniques that are shaping the future of eco-friendly construction.',
                'content' => '<p>Sustainable construction is no longer just a trend—it\'s becoming the standard for responsible building practices. In this post, we explore the latest innovations in green building materials, energy-efficient design, and sustainable construction techniques.</p><p>From recycled steel to bio-based insulation materials, the construction industry is embracing environmentally friendly alternatives that don\'t compromise on quality or performance.</p>',
                'status' => 'published',
                'post_type' => 'post',
                'user_id' => $user->id,
                'published_at' => now()->subDays(5),
                'category_slug' => 'sustainability',
            ],
            [
                'title' => 'BIM Technology in Modern Construction',
                'slug' => 'bim-technology-modern-construction',
                'excerpt' => 'How Building Information Modeling is revolutionizing the way we design and construct buildings.',
                'content' => '<p>Building Information Modeling (BIM) has transformed the construction industry by enabling better collaboration, reducing errors, and improving project efficiency.</p><p>This technology allows engineers, architects, and contractors to work with shared 3D models that contain detailed information about every aspect of a building project.</p>',
                'status' => 'published',
                'post_type' => 'post',
                'user_id' => $user->id,
                'published_at' => now()->subDays(12),
                'category_slug' => 'engineering-insights',
            ],
            [
                'title' => 'Project Management Best Practices',
                'slug' => 'project-management-best-practices',
                'excerpt' => 'Essential strategies for successful project delivery in the construction industry.',
                'content' => '<p>Effective project management is crucial for the success of any construction project. Here are some best practices that have proven successful in managing complex engineering projects.</p><p>From stakeholder communication to risk management, these strategies help ensure projects are delivered on time and within budget.</p>',
                'status' => 'published',
                'post_type' => 'post',
                'user_id' => $user->id,
                'published_at' => now()->subDays(20),
                'category_slug' => 'project-management',
            ],
        ];

        foreach ($posts as $postData) {
            $categorySlug = $postData['category_slug'] ?? null;
            unset($postData['category_slug']); // Remove from data before creating post

            $post = Post::create($postData);

            // Handle category relationship if specified
            if ($categorySlug) {
                $category = $categories->where('slug', $categorySlug)->first();
                if ($category) {
                    $post->terms()->attach($category->id);
                }
            }
        }
    }

    private function createContactMessages(): void
    {
        $messages = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.johnson@example.com',
                'phone' => '+1 (555) 123-4567',
                'company' => 'Johnson Construction LLC',
                'subject' => 'Bridge Design Consultation',
                'message' => 'Hi, I\'m interested in discussing a potential bridge design project for our client. The project involves a 200-foot span over a river. Could we schedule a consultation?',
                'is_read' => false,
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'mchen@techcorp.com',
                'phone' => '+1 (555) 987-6543',
                'company' => 'TechCorp Industries',
                'subject' => 'Commercial Building Structural Review',
                'message' => 'We need a structural engineer to review our proposed office building design. The building will be 12 stories with mixed-use on the ground floor.',
                'is_read' => true,
                'created_at' => now()->subDays(5),
            ],
            [
                'name' => 'Emily Rodriguez',
                'email' => 'emily@cityplanning.gov',
                'phone' => '+1 (555) 456-7890',
                'company' => 'City Planning Department',
                'subject' => 'Infrastructure Assessment Project',
                'message' => 'The city is looking for qualified engineers to assess our aging infrastructure. This would be a long-term consulting engagement. Please let us know your availability.',
                'is_read' => false,
                'created_at' => now()->subDays(8),
            ],
            [
                'name' => 'David Thompson',
                'email' => 'dthompson@residential.com',
                'phone' => '+1 (555) 234-5678',
                'company' => 'Thompson Residential',
                'subject' => 'Residential Development - Structural Design',
                'message' => 'We\'re planning a 50-unit residential development and need structural engineering services. The project includes both single-family homes and townhouses.',
                'is_read' => true,
                'created_at' => now()->subDays(12),
            ],
            [
                'name' => 'Lisa Park',
                'email' => 'lpark@greenbuilding.org',
                'phone' => '+1 (555) 345-6789',
                'company' => 'Green Building Solutions',
                'subject' => 'Sustainable Design Collaboration',
                'message' => 'We\'ve reviewed your portfolio and are impressed with your sustainable design work. We\'d like to discuss potential collaboration opportunities on upcoming green building projects.',
                'is_read' => false,
                'created_at' => now()->subDays(15),
            ],
        ];

        foreach ($messages as $message) {
            ContactMessage::create($message);
        }
    }
}
