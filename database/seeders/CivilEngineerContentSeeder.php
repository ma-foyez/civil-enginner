<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\Education;
use App\Models\Experience;
use App\Models\HeroSection;
use App\Models\PortfolioProject;
use App\Models\Term;
use Illuminate\Database\Seeder;

class CivilEngineerContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createHeroSections();
        $this->createAboutSections();
        $this->createEducation();
        $this->createExperience();
        $this->createPortfolioCategories();
        $this->createPortfolioProjects();
    }

    private function createHeroSections(): void
    {
        HeroSection::create([
            'title' => 'Civil Engineer & Project Manager',
            'subtitle' => 'Building Tomorrow\'s Infrastructure Today',
            'description' => 'With over 8 years of experience in civil engineering and project management, I specialize in structural design, construction management, and sustainable infrastructure development.',
            'primary_button_text' => 'View Portfolio',
            'primary_button_url' => '/portfolio',
            'secondary_button_text' => 'Contact Me',
            'secondary_button_url' => '/contact',
            'background_type' => 'image',
            'is_active' => true,
            'priority' => 1,
        ]);
    }

    private function createAboutSections(): void
    {
        $aboutData = [
            'title' => 'About Me',
            'short_description' => 'Passionate civil engineer with expertise in structural design and project management.',
            'full_description' => 'I am a dedicated civil engineer with over 8 years of experience in the construction and infrastructure industry. My expertise spans across structural design, project management, construction supervision, and sustainable development practices. I have successfully managed projects ranging from residential buildings to large-scale infrastructure developments.',
            'years_of_experience' => 8,
            'projects_completed' => 45,
            'happy_clients' => 32,
            'is_active' => true,
            'priority' => 1,
        ];

        $skills = [
            'Structural Design',
            'Project Management',
            'AutoCAD',
            'SAP2000',
            'ETABS',
            'Construction Management',
            'Sustainable Design',
            'Building Codes & Standards'
        ];

        $specializations = [
            'Residential Buildings',
            'Commercial Structures',
            'Bridge Design',
            'Highway Engineering',
            'Water Management Systems'
        ];

        $about = AboutSection::create($aboutData);
        $about->skills = $skills;
        $about->specializations = $specializations;
        $about->save();
    }

    private function createEducation(): void
    {
        $educationData = [
            [
                'institution_name' => 'Massachusetts Institute of Technology',
                'degree' => 'Master of Science',
                'field_of_study' => 'Structural Engineering',
                'description' => 'Specialized in advanced structural analysis and seismic design. Thesis on sustainable construction materials.',
                'location' => 'Cambridge, MA, USA',
                'gpa' => 3.85,
                'start_date' => '2018-09-01',
                'end_date' => '2020-06-15',
                'is_current' => false,
                'is_active' => true,
                'priority' => 1,
                'achievements' => [
                    'Dean\'s List for 3 consecutive semesters',
                    'Graduate Research Assistant',
                    'Published 2 papers in international journals'
                ],
                'courses' => [
                    'Advanced Structural Analysis',
                    'Earthquake Engineering',
                    'Finite Element Analysis',
                    'Sustainable Construction Materials'
                ]
            ],
            [
                'institution_name' => 'University of California, Berkeley',
                'degree' => 'Bachelor of Science',
                'field_of_study' => 'Civil Engineering',
                'description' => 'Comprehensive undergraduate program covering all aspects of civil engineering with focus on structural and environmental engineering.',
                'location' => 'Berkeley, CA, USA',
                'gpa' => 3.7,
                'start_date' => '2014-08-25',
                'end_date' => '2018-05-20',
                'is_current' => false,
                'is_active' => true,
                'priority' => 2,
                'achievements' => [
                    'Magna Cum Laude',
                    'ASCE Student Chapter President',
                    'Outstanding Senior Design Project'
                ],
                'courses' => [
                    'Structural Analysis',
                    'Geotechnical Engineering',
                    'Transportation Engineering',
                    'Environmental Engineering'
                ]
            ]
        ];

        foreach ($educationData as $data) {
            $achievements = $data['achievements'];
            $courses = $data['courses'];
            unset($data['achievements'], $data['courses']);

            $education = Education::create($data);
            $education->achievements = $achievements;
            $education->courses = $courses;
            $education->save();
        }
    }

    private function createExperience(): void
    {
        $experienceData = [
            [
                'company_name' => 'Stellar Infrastructure Inc.',
                'position' => 'Senior Project Manager',
                'description' => 'Leading large-scale infrastructure projects including highway construction and bridge rehabilitation.',
                'responsibilities' => 'Manage project teams of 15-25 professionals, coordinate with stakeholders, ensure project delivery within budget and timeline, conduct site inspections and quality control.',
                'location' => 'San Francisco, CA',
                'employment_type' => 'Full-time',
                'start_date' => '2021-03-01',
                'end_date' => null,
                'is_current' => true,
                'is_active' => true,
                'priority' => 1,
                'achievements' => [
                    'Successfully delivered $15M highway expansion project 2 months ahead of schedule',
                    'Reduced project costs by 12% through optimized design solutions',
                    'Led team that won "Excellence in Infrastructure" award'
                ],
                'technologies' => [
                    'Primavera P6',
                    'AutoCAD Civil 3D',
                    'Bentley MicroStation',
                    'Microsoft Project'
                ]
            ],
            [
                'company_name' => 'BuildTech Engineering',
                'position' => 'Structural Engineer',
                'description' => 'Designed and analyzed structural systems for commercial and residential buildings.',
                'responsibilities' => 'Performed structural analysis and design, prepared construction drawings, conducted site visits, collaborated with architects and contractors.',
                'location' => 'Los Angeles, CA',
                'employment_type' => 'Full-time',
                'start_date' => '2019-07-15',
                'end_date' => '2021-02-28',
                'is_current' => false,
                'is_active' => true,
                'priority' => 2,
                'achievements' => [
                    'Designed structural systems for 25+ buildings',
                    'Implemented BIM workflow reducing design time by 30%',
                    'Mentored 3 junior engineers'
                ],
                'technologies' => [
                    'SAP2000',
                    'ETABS',
                    'SAFE',
                    'Revit Structure',
                    'AutoCAD'
                ]
            ]
        ];

        foreach ($experienceData as $data) {
            $achievements = $data['achievements'];
            $technologies = $data['technologies'];
            unset($data['achievements'], $data['technologies']);

            $experience = Experience::create($data);
            $experience->achievements = $achievements;
            $experience->technologies = $technologies;
            $experience->save();
        }
    }

    private function createPortfolioCategories(): void
    {
        $categories = [
            ['name' => 'residential', 'label' => 'Residential Projects'],
            ['name' => 'commercial', 'label' => 'Commercial Buildings'],
            ['name' => 'infrastructure', 'label' => 'Infrastructure'],
            ['name' => 'bridges', 'label' => 'Bridge Projects'],
        ];

        foreach ($categories as $category) {
            Term::create([
                'name' => $category['label'],
                'slug' => $category['name'],
                'taxonomy' => 'portfolio_category',
                'description' => 'Portfolio category for ' . strtolower($category['label']),
            ]);
        }
    }

    private function createPortfolioProjects(): void
    {
        $categories = Term::where('taxonomy', 'portfolio_category')->get();

        $projects = [
            [
                'title' => 'Golden Gate Residences',
                'description' => 'A luxury residential complex featuring modern architecture and sustainable design principles.',
                'content' => '<p>This project involved the design and construction management of a 120-unit luxury residential complex. The project featured innovative structural solutions including post-tensioned slabs and advanced seismic design.</p><p>Key features include energy-efficient systems, green building materials, and smart home technology integration.</p>',
                'client_name' => 'Golden Gate Development Corp',
                'location' => 'San Francisco, CA',
                'project_value' => 25000000.00,
                'start_date' => '2022-01-15',
                'completion_date' => '2023-11-30',
                'is_active' => true,
                'priority' => 1,
                'category_id' => $categories->where('slug', 'residential')->first()?->id,
                'technologies' => ['ETABS', 'AutoCAD', 'Revit', 'SAP2000'],
            ],
            [
                'title' => 'Metro Business Center',
                'description' => 'A 15-story commercial office building with state-of-the-art structural systems.',
                'content' => '<p>This commercial project showcases advanced engineering solutions including a steel moment frame system with composite floor construction. The building incorporates cutting-edge technology for both structural performance and energy efficiency.</p>',
                'client_name' => 'Metro Real Estate Group',
                'location' => 'Los Angeles, CA',
                'project_value' => 45000000.00,
                'start_date' => '2021-03-01',
                'completion_date' => '2023-08-15',
                'is_active' => true,
                'priority' => 2,
                'category_id' => $categories->where('slug', 'commercial')->first()?->id,
                'technologies' => ['SAP2000', 'ETABS', 'SAFE', 'Tekla Structures'],
            ],
            [
                'title' => 'Bay Area Bridge Rehabilitation',
                'description' => 'Comprehensive rehabilitation of a critical transportation bridge including seismic upgrades.',
                'content' => '<p>This infrastructure project involved the complete rehabilitation of a 1.2-mile bridge including seismic retrofitting, deck replacement, and structural upgrades to meet current design standards.</p>',
                'client_name' => 'California Department of Transportation',
                'location' => 'Oakland, CA',
                'project_value' => 15000000.00,
                'start_date' => '2020-06-01',
                'completion_date' => '2022-04-30',
                'is_active' => true,
                'priority' => 3,
                'category_id' => $categories->where('slug', 'bridges')->first()?->id,
                'technologies' => ['CSiBridge', 'MIDAS Civil', 'AutoCAD Civil 3D'],
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
}
