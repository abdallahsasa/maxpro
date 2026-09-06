<?php

namespace Database\Seeders;

use App\Models\Commitment;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Statistic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Truncate or clean tables first to avoid duplicates
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Page::truncate();
        Commitment::truncate();
        Statistic::truncate();
        Sector::truncate();
        Service::truncate();
        Project::truncate();
        Partner::truncate();
        DB::table('project_service')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Pages
        Page::create([
            'identifier' => 'about',
            'title' => [
                'fr' => 'À propos de MAX PRO SOLS',
                'en' => 'About MAX PRO SOLS',
                'ar' => 'عن ماكس برو (MAX PRO SOLS)',
            ],
            'slug' => [
                'fr' => 'a-propos',
                'en' => 'about',
                'ar' => 'about',
            ],
            'content' => [
                'fr' => '<p class="lead font-semibold text-slate-900 text-xl mb-6">Notre savoir-faire au service de vos projets</p><p>MAX PRO SOLS est une entreprise francilienne spécialisée dans la réalisation de travaux de revêtements de sols et murs pour les professionnels du bâtiment, maîtres d’ouvrage, promoteurs, architectes et entreprises générales.</p><p>Nous intervenons à Paris et en Île-de-France sur des projets de construction neuve, de rénovation et d’aménagement.</p><p>Notre savoir-faire couvre notamment le carrelage et la faïence, le parquet, les sols souples, les revêtements en résine, les chapes, le ragréage ainsi que la préparation des supports.</p><p>De l’étude du dossier à la réception des travaux, nos équipes assurent un suivi rigoureux du chantier avec une attention particulière portée à la qualité d’exécution, au respect des prescriptions techniques et aux délais.</p>',
                'en' => '<p class="lead font-semibold text-slate-900 text-xl mb-6">Our expertise at the service of your projects</p><p>MAX PRO SOLS is a Paris region specialist company in floor and wall coverings for building professionals, project owners, developers, architects, and general contractors.</p><p>We operate across Paris and Île-de-France on new construction, renovation, and fit-out projects.</p><p>Our expertise notably covers tiling and earthenware, parquet flooring, resilient flooring, resin coatings, screeds, leveling compounds, and substrate preparation.</p><p>From initial dossier study to final handover, our teams ensure rigorous site supervision with dedicated attention to execution quality, compliance with technical specifications, and strict schedule adherence.</p>',
                'ar' => '<p class="lead font-semibold text-slate-900 text-xl mb-6">خبرتنا في خدمة مشاريعكم</p><p>ماكس برو (MAX PRO SOLS) هي شركة متخصصة في منطقة باريس وإيل دو فرانس في تنفيذ أعمال وتكسيات الأرضيات والجدران لمحترفي البناء، وأصحاب المشاريع، والمطورين العقاريين، والمهندسين المعماريين، وشركات المقاولات العامة.</p><p>نعمل في باريس وكافة مدن إيل دو فرانس على مشاريع البناء الجديد، والتجديد، وإعادة التهيئة والتأهيل.</p><p>تغطي خبراتنا المتميزة أعمال السيراميك والبورسلين، الباركيه والأرضيات الخشبية، الأرضيات المرنة، أرضيات الراتنج والإيبوكسي، اللياسة والصبات، التسوية الذاتية، بالإضافة إلى الإعداد الشامل للأسطح والأساسات.</p><p>من دراسة الملف الفني حتى تسليم المشروع النهائي، تحرص فرقنا على المتابعة الميدانية الدقيقة مع اهتمام فائق بجودة التنفيذ والالتزام الصارم بالمواصفات الهندسية والمواعيد المحددة.</p>',
            ],
            'is_published' => true,
        ]);

        // 2. Commitments
        $commitmentsData = [
            [
                'title' => [
                    'fr' => 'Qualité d’exécution',
                    'en' => 'Execution Quality',
                    'ar' => 'جودة التنفيذ والتشطيب',
                ],
                'description' => [
                    'fr' => 'Une attention particulière portée à la préparation des supports, à la mise en œuvre et aux finitions.',
                    'en' => 'Meticulous attention paid to substrate preparation, installation, and final finishing.',
                    'ar' => 'اهتمام دقيق وخاص بإعداد الأسطح والأساسات، والتنفيذ الفني المتقن والتشطيبات النهائية.',
                ],
                'order_column' => 1,
            ],
            [
                'title' => [
                    'fr' => 'Respect des délais',
                    'en' => 'Schedule Adherence',
                    'ar' => 'الالتزام الصارم بالمواعيد',
                ],
                'description' => [
                    'fr' => 'Organisation et mobilisation de nos équipes en fonction des contraintes et du planning de chaque chantier.',
                    'en' => 'Organization and mobilization of our teams according to the constraints and timeline of each project.',
                    'ar' => 'تنظيم وحشد فرق العمل الميدانية بما يتوافق مع متطلبات وجدول كل مشروع.',
                ],
                'order_column' => 2,
            ],
            [
                'title' => [
                    'fr' => 'Maîtrise technique',
                    'en' => 'Technical Mastery',
                    'ar' => 'الإتقان والمعايير الفنية',
                ],
                'description' => [
                    'fr' => 'Mise en œuvre des revêtements conformément aux prescriptions techniques applicables et aux recommandations des fabricants.',
                    'en' => 'Installation of coverings in strict accordance with applicable technical standards and manufacturers’ recommendations.',
                    'ar' => 'تنفيذ التكسيات والأرضيات وفقاً للمواصفات الفنية المعتمدة وتوصيات المصنّعين العالمية.',
                ],
                'order_column' => 3,
            ],
            [
                'title' => [
                    'fr' => 'Suivi de chantier',
                    'en' => 'Dedicated Site Supervision',
                    'ar' => 'المتابعة والإشراف المستمر',
                ],
                'description' => [
                    'fr' => 'Un interlocuteur dédié pour assurer le suivi du projet, de l’étude jusqu’à la réception des travaux.',
                    'en' => 'A dedicated contact person to oversee the project, from initial planning to work handover.',
                    'ar' => 'مسؤول مشروع مخصص يرافقكم في كافة المراحل من دراسة المخططات حتى الاستلام النهائي.',
                ],
                'order_column' => 4,
            ],
            [
                'title' => [
                    'fr' => 'Garantie décennale',
                    'en' => '10-Year Decennial Warranty',
                    'ar' => 'الضمان العشري (10 سنوات)',
                ],
                'description' => [
                    'fr' => 'Nos travaux sont couverts par une assurance responsabilité civile et décennale adaptée à nos activités.',
                    'en' => 'Our works are covered by civil liability and decennial insurance tailored to our activities.',
                    'ar' => 'أعمالنا مشمولة بالتأمين ضد المسؤولية المدنية والتأمين العشري المعتمد لجميع أنشطتنا.',
                ],
                'order_column' => 5,
            ],
        ];

        foreach ($commitmentsData as $item) {
            Commitment::create($item);
        }

        // 3. Statistics
        Statistic::insert([
            [
                'type' => 'key_figure',
                'value' => '150 000+',
                'label' => json_encode([
                    'fr' => 'm² de Sols & Murs Posés',
                    'en' => 'm² Installed Surfaces',
                    'ar' => 'متر مربع تم تركيبه',
                ]),
                'order_column' => 1,
            ],
            [
                'type' => 'key_figure',
                'value' => '500+',
                'label' => json_encode([
                    'fr' => 'Chantiers Professionnels Réalisés',
                    'en' => 'Commercial Projects Completed',
                    'ar' => 'مشروع منجز للمحترفين',
                ]),
                'order_column' => 2,
            ],
            [
                'type' => 'key_figure',
                'value' => '15+',
                'label' => json_encode([
                    'fr' => 'Années d’Expérience & Savoir-Faire',
                    'en' => 'Years of Technical Expertise',
                    'ar' => 'عاماً من الخبرة والاحتراف',
                ]),
                'order_column' => 3,
            ],
            [
                'type' => 'key_figure',
                'value' => '100%',
                'label' => json_encode([
                    'fr' => 'Conformité Normes DTU & CSTB',
                    'en' => 'DTU & CSTB Norms Compliance',
                    'ar' => 'مطابقة تامة للمواصفات الفرنسية',
                ]),
                'order_column' => 4,
            ],
        ]);

        // 4. Sectors
        $sector1 = Sector::create([
            'title' => [
                'fr' => 'Tertiaire & Bureaux d’Entreprises',
                'en' => 'Corporate Offices & Workspaces',
                'ar' => 'المكاتب والشركات',
            ],
            'slug' => [
                'fr' => 'tertiaire-bureaux',
                'en' => 'corporate-offices',
                'ar' => 'corporate-offices',
            ],
            'description' => [
                'fr' => 'Revêtements acoustiques et sols à fort trafic conçus pour le confort de travail et l’image de marque.',
                'en' => 'Acoustic and high-traffic floor and wall systems designed for comfort and modern corporate identity.',
                'ar' => 'أرضيات وجدران عازلة للصوت ومقاومة للحركة الكثيفة للمكاتب والمقرات.',
            ],
            'is_published' => true,
        ]);

        $sector2 = Sector::create([
            'title' => [
                'fr' => 'Industrie & Logistique',
                'en' => 'Industrial & Logistics Hubs',
                'ar' => 'المستودعات والمنشآت الصناعية',
            ],
            'slug' => [
                'fr' => 'industrie-logistique',
                'en' => 'industrial-logistics',
                'ar' => 'industrial-logistics',
            ],
            'description' => [
                'fr' => 'Systèmes de résine époxy et polyuréthane ultra-résistants aux charges lourdes et agressions chimiques.',
                'en' => 'Heavy-duty epoxy and polyurethane resin flooring resistant to heavy loads and chemical impact.',
                'ar' => 'أنظمة إيبوكسي وبولي يوريثان عالية التحمل للأوزان الثقيلة والمواد الكيميائية.',
            ],
            'is_published' => true,
        ]);

        $sector3 = Sector::create([
            'title' => [
                'fr' => 'Retail & Hôtellerie de Luxe',
                'en' => 'Luxury Retail & Hospitality',
                'ar' => 'المتاجر الفاخرة والفنادق',
            ],
            'slug' => [
                'fr' => 'retail-hotellerie-luxe',
                'en' => 'luxury-retail-hospitality',
                'ar' => 'luxury-retail-hospitality',
            ],
            'description' => [
                'fr' => 'Parquets prestigieux en point de Hongrie, bétons cirés et décors muraux pour boutiques et hôtels de prestige.',
                'en' => 'Chevron oak parquet, micro-cement, and signature wall claddings for flagship stores and boutique hotels.',
                'ar' => 'باركيه فرنسي فاخر وتكسيات راقية للبوتيكات والفنادق الفخمة.',
            ],
            'is_published' => true,
        ]);

        // 5. Services (الاختصاصات)
        $service1 = Service::create([
            'title' => [
                'fr' => 'Carrelage & Faïence',
                'en' => 'Tiling & Earthenware',
                'ar' => 'السيراميك والبورسلين والتكسيات الجدارية',
            ],
            'slug' => [
                'fr' => 'carrelage-faience',
                'en' => 'tiling-earthenware',
                'ar' => 'carrelage-faience',
            ],
            'overview' => [
                'fr' => '<p>Pose de carrelage et faïence, grands formats, grès cérame et revêtements muraux pour projets résidentiels, tertiaires et commerciaux.</p>',
                'en' => '<p>Installation of tiles and earthenware, large formats, porcelain stoneware, and wall coverings for residential, commercial, and tertiary projects.</p>',
                'ar' => '<p>تركيب السيراميك والبورسلين والقياسات الكبيرة، والجرانيت والتكسيات الجدارية للمشاريع السكنية والإدارية والتجارية.</p>',
            ],
            'solutions' => [
                'fr' => '<p>Grands formats jusqu’à 120x240cm, grès cérame pleine masse, faïence décorative, étanchéité sous carrelage (SPEC), mortiers-colles déformables C2S1/C2S2.</p>',
                'en' => '<p>Large formats up to 120x240cm, full-body porcelain stoneware, decorative tiles, waterproofing systems under tiles, high-performance C2S1/C2S2 adhesives.</p>',
                'ar' => '<p>بلاطات كبيرة الحجم حتى 120×240 سم، بورسلين عالي المقاومة، تكسيات جدارية، أنظمة عزل الرطوبة ومواد لاصقة عالية المرونة.</p>',
            ],
            'image' => 'images/project_luxury_boutique.jpg',
            'order_column' => 1,
            'is_published' => true,
        ]);

        $service2 = Service::create([
            'title' => [
                'fr' => 'Parquet',
                'en' => 'Parquet Flooring',
                'ar' => 'الباركيه والأرضيات الخشبية',
            ],
            'slug' => [
                'fr' => 'parquet',
                'en' => 'parquet-flooring',
                'ar' => 'parquet',
            ],
            'overview' => [
                'fr' => '<p>Pose de parquets massifs, contrecollés et stratifiés : pose droite, bâton rompu, point de Hongrie et finitions.</p>',
                'en' => '<p>Installation of solid, engineered, and laminate parquet: straight lay, herringbone, chevron (point de Hongrie), and high-end finishes.</p>',
                'ar' => '<p>تركيب الباركيه الطبيعي والمصفح وشبه الطبيعي: تركيب طولي، نقشة عظم السمكة، نقطة هنغاريا والتشطيبات الفاخرة.</p>',
            ],
            'solutions' => [
                'fr' => '<p>Fourniture et pose de parquets massifs et contrecollés en chêne de France. Spécialistes des calepinages complexes, ponçage traditionnel, vitrification et huilage.</p>',
                'en' => '<p>Supply and installation of premium French oak solid and engineered hardwood flooring. Specialists in chevron, herringbone, grand plank patterns, sanding, and oiling.</p>',
                'ar' => '<p>توريد وتركيب خشب البلوط الطبيعي والمصفح، نقشات الشفرون والتركيب الكلاسيكي، الصنفرة والتلميع والتشطيب بالزيت المقاوم.</p>',
            ],
            'image' => 'images/service_hardwood.jpg',
            'order_column' => 2,
            'is_published' => true,
        ]);

        $service3 = Service::create([
            'title' => [
                'fr' => 'Sols Souples',
                'en' => 'Resilient Flooring',
                'ar' => 'الأرضيات المرنة (PVC & LVT)',
            ],
            'slug' => [
                'fr' => 'sols-souples',
                'en' => 'resilient-flooring',
                'ar' => 'sols-souples',
            ],
            'overview' => [
                'fr' => '<p>PVC, LVT, linoléum, moquette et solutions acoustiques adaptées aux logements, bureaux, commerces et établissements recevant du public.</p>',
                'en' => '<p>PVC, LVT, linoleum, carpet tiles, and acoustic solutions tailored for housing, offices, retail, and public buildings (ERP).</p>',
                'ar' => '<p>أرضيات PVC، LVT، لينوليوم، موكيت والحلول الصوتية المصممة للمباني السكنية، المكاتب، المتاجر والمرافق العامة.</p>',
            ],
            'solutions' => [
                'fr' => '<p>Dalles et lames LVT clipsables ou collées, revêtements PVC en lés thermosoudés, linoléum naturel, moquettes en dalles à haute performance acoustique.</p>',
                'en' => '<p>Click and glued LVT planks, hot-welded sheet vinyl, natural linoleum, heavy-duty acoustic commercial carpet tiles.</p>',
                'ar' => '<p>ألواح وبلاط LVT، أرضيات فينيل ملحومة حرارياً، لينوليوم طبيعي، وموكيت عازل للصوت للمكاتب والفنادق.</p>',
            ],
            'image' => 'images/service_lvt.jpg',
            'order_column' => 3,
            'is_published' => true,
        ]);

        $service4 = Service::create([
            'title' => [
                'fr' => 'Résine',
                'en' => 'Resin Flooring',
                'ar' => 'أرضيات الراتنج والإيبوكسي',
            ],
            'slug' => [
                'fr' => 'resine',
                'en' => 'resin-flooring',
                'ar' => 'resine',
            ],
            'overview' => [
                'fr' => '<p>Systèmes de sols en résine époxy et polyuréthane adaptés aux contraintes techniques, esthétiques et d’exploitation.</p>',
                'en' => '<p>Epoxy and polyurethane resin floor systems engineered for technical performance, aesthetic demands, and heavy-duty operation.</p>',
                'ar' => '<p>أنظمة أرضيات الراتنج والإيبوكسي والبولي يوريثان المصممة لتحمل الضغوط الفنية والجمالية وظروف التشغيل القاسية.</p>',
            ],
            'solutions' => [
                'fr' => '<p>Résine autolissante époxy, revêtements polyuréthane souples et confort, chapes de résine haute résistance chimique et mécanique pour parkings, usines et laboratoires.</p>',
                'en' => '<p>Self-smoothing epoxy, comfortable polyurethane coatings, heavy chemical and mechanical resistance resin screeds for car parks, plants, and cleanrooms.</p>',
                'ar' => '<p>إيبوكسي ذاتي التسوية، بولي يوريثان مرن وعازل، وأرضيات راتنجية للمواقف والمصانع والمختبرات الطبية.</p>',
            ],
            'image' => 'images/service_resin.jpg',
            'order_column' => 4,
            'is_published' => true,
        ]);

        $service5 = Service::create([
            'title' => [
                'fr' => 'Chape & Ragréage',
                'en' => 'Screed & Leveling',
                'ar' => 'اللياسة والتسوية الذاتية',
            ],
            'slug' => [
                'fr' => 'chape-ragreage',
                'en' => 'screed-leveling',
                'ar' => 'chape-ragreage',
            ],
            'overview' => [
                'fr' => '<p>Réalisation de chapes, ragréages et travaux de remise à niveau avant pose des revêtements.</p>',
                'en' => '<p>Execution of screeds, self-leveling compounds, and surface leveling prior to coverings installation.</p>',
                'ar' => '<p>تنفيذ الصبات واللياسة والتسوية الذاتية ومعالجة وتسوية الأسطح قبل تركيب التكسيات والأرضيات.</p>',
            ],
            'solutions' => [
                'fr' => '<p>Chapes fluides ciment et anhydrite, ragréages autonivelants fibrés classement P3/P4, ponçage mécanique, fraisage et préparation minutieuse des supports.</p>',
                'en' => '<p>Cementitious and anhydrite fluid screeds, fiber-reinforced self-leveling P3/P4, mechanical sanding, scarifying, and meticulous substrate preparation.</p>',
                'ar' => '<p>صبات سائلة إسمنتية ومائية، تسوية ذاتية مدعمة بالألياف، صنفرة ميكانيكية وإعداد هندسي فائق للأساسات.</p>',
            ],
            'image' => 'images/project_logistics.jpg',
            'order_column' => 5,
            'is_published' => true,
        ]);

        // 6. Projects
        $proj1 = Project::create([
            'sector_id' => $sector2->id,
            'title' => [
                'fr' => 'Plateforme Logistique Renault Flins',
                'en' => 'Renault Logistics Centre Flins',
                'ar' => 'مركز رينو للخدمات اللوجستية',
            ],
            'slug' => [
                'fr' => 'renault-logistics-flins',
                'en' => 'renault-logistics-flins',
                'ar' => 'renault-logistics-flins',
            ],
            'location' => [
                'fr' => 'Flins-sur-Seine, Île-de-France',
                'en' => 'Flins-sur-Seine, Paris Region',
                'ar' => 'فلين سور سين، منطقة باريس',
            ],
            'surface_areas' => [
                'fr' => '15 000 m²',
                'en' => '15,000 m²',
                'ar' => '15,000 م²',
            ],
            'is_featured' => true,
            'published_at' => now(),
            'main_image' => 'images/project_logistics.jpg',
            'scope' => [
                'fr' => '<p>Application complète d’un système de résine époxy autolissante haute résistance au trafic intense de chariots élévateurs avec signalétique au sol intégrée.</p>',
                'en' => '<p>Full installation of a heavy-duty self-smoothing epoxy flooring system engineered for heavy forklift traffic with integrated safety markings.</p>',
                'ar' => '<p>تطبيق شامل لنظام إيبوكسي ذاتي التسوية لتحمل حركة الرافعات الشوكية مع خطوط مسارات السلامة المدمجة.</p>',
            ],
        ]);
        $proj1->services()->attach([$service4->id, $service5->id]);

        $proj2 = Project::create([
            'sector_id' => $sector3->id,
            'title' => [
                'fr' => 'Flagship Boutique de Haute Joaillerie',
                'en' => 'Haute Joaillerie Flagship Boutique',
                'ar' => 'بوتيك المجوهرات الفاخرة - الشانزلزيه',
            ],
            'slug' => [
                'fr' => 'boutique-haute-joaillerie-paris',
                'en' => 'haute-joaillerie-flagship-paris',
                'ar' => 'haute-joaillerie-flagship-paris',
            ],
            'location' => [
                'fr' => 'Champs-Élysées, Paris 8e',
                'en' => 'Champs-Élysées, Paris 8th',
                'ar' => 'الشانزلزيه، باريس',
            ],
            'surface_areas' => [
                'fr' => '2 500 m²',
                'en' => '2,500 m²',
                'ar' => '2,500 م²',
            ],
            'is_featured' => true,
            'published_at' => now(),
            'main_image' => 'images/project_luxury_boutique.jpg',
            'scope' => [
                'fr' => '<p>Pose millimétrée de parquet en chêne massif de France en point de Hongrie et habillages muraux acoustiques assortis sur l’ensemble des salons privatifs.</p>',
                'en' => '<p>Precision installation of solid French oak chevron parquet and matching bespoke acoustic wall linings across all private VIP salons.</p>',
                'ar' => '<p>تركيب دقيق للباركيه الفرنسي بنمط الشفرون وتكسيات جدارية عازلة للصوت في صالونات كبار الشخصيات.</p>',
            ],
        ]);
        $proj2->services()->attach([$service2->id, $service3->id]);

        // 7. Partners (Leading European construction and flooring brands)
        $partners = [
            ['name' => 'Tarkett', 'url' => 'https://www.tarkett.fr', 'order_column' => 1],
            ['name' => 'Gerflor', 'url' => 'https://www.gerflor.fr', 'order_column' => 2],
            ['name' => 'Forbo Flooring', 'url' => 'https://www.forbo.com', 'order_column' => 3],
            ['name' => 'Mapei', 'url' => 'https://www.mapei.com/fr', 'order_column' => 4],
            ['name' => 'Sika', 'url' => 'https://fra.sika.com', 'order_column' => 5],
            ['name' => 'Bostik', 'url' => 'https://www.bostik.com/france', 'order_column' => 6],
        ];

        foreach ($partners as $partner) {
            Partner::create([
                'name' => $partner['name'],
                'url' => $partner['url'],
                'is_active' => true,
                'order_column' => $partner['order_column'],
            ]);
        }
    }
}
