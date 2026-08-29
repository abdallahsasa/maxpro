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
                'fr' => 'À Propos de MAX PRO SOLS',
                'en' => 'About MAX PRO SOLS',
                'ar' => 'عن ماكس برو للأرضيات',
            ],
            'slug' => [
                'fr' => 'a-propos',
                'en' => 'about',
                'ar' => 'about',
            ],
            'content' => [
                'fr' => '<p>MAX PRO SOLS est une entreprise de référence en revêtements de sols et de murs haut de gamme au service des professionnels du bâtiment, promoteurs et architectes à Paris et en Île-de-France depuis plus de 15 ans. Nous allions rigueur technique (normes DTU, PV de classement), maîtrise des matériaux innovants et respect absolu des délais.</p>',
                'en' => '<p>MAX PRO SOLS is a premier commercial flooring and wall covering contractor serving main contractors, property developers, and architects across Paris and Île-de-France for over 15 years. We combine technical excellence (French DTU standards), advanced materials, and strict schedule adherence.</p>',
                'ar' => '<p>ماكس برو للأرضيات والجدران هي الشركة الرائدة في حلول الأرضيات والتكسيات الجدارية المتميزة للمشاريع الكبرى والمهندسين المعماريين في باريس ومنطقة إيل دو فرانس لأكثر من 15 عاماً.</p>',
            ],
            'is_published' => true,
        ]);

        // 2. Commitments
        $commitmentsData = [
            [
                'title' => [
                    'fr' => 'Rigueur Technique & Normes DTU',
                    'en' => 'Technical Rigor & French DTU Standards',
                    'ar' => 'المعايير الفنية والجودة الصارمة',
                ],
                'description' => [
                    'fr' => 'Application scrupuleuse des règles professionnelles, tests d’humidité, préparation soignée des supports et traçabilité des matériaux.',
                    'en' => 'Strict adherence to professional trade standards, moisture testing, substrate preparation, and certified material traceability.',
                    'ar' => 'الالتزام التام بالمواصفات القياسية، فحص الرطوبة وإعداد الأساسات بأعلى دقة.',
                ],
                'order_column' => 1,
            ],
            [
                'title' => [
                    'fr' => 'Respect Strict des Délais de Chantier',
                    'en' => 'Strict Adherence to Project Schedules',
                    'ar' => 'الالتزام الصارم بالمواعيد',
                ],
                'description' => [
                    'fr' => 'Capacité de mobilisation rapide de nos équipes qualifiées pour garantir la livraison de vos chantiers tertiaires et industriels dans les temps.',
                    'en' => 'Rapid deployment of certified installation teams to ensure on-time handover for all commercial and industrial sites.',
                    'ar' => 'قدرة عالية على حشد فرق العمل لضمان تسليم المشاريع في المواعيد المحددة.',
                ],
                'order_column' => 2,
            ],
            [
                'title' => [
                    'fr' => 'Garantie Décennale & Partenaires Agréés',
                    'en' => '10-Year Warranty & Certified Partners',
                    'ar' => 'ضمان لمدة 10 سنوات وشركاء معتمدون',
                ],
                'description' => [
                    'fr' => 'Tous nos ouvrages sont couverts par une assurance décennale française. Nous travaillons en étroite collaboration avec les plus grands fabricants européens.',
                    'en' => 'All installations are fully covered by French 10-year structural warranty, working in direct partnership with leading European manufacturers.',
                    'ar' => 'جميع الأعمال مشمولة بالتأمين العشري الفرنسي مع أفضل المصنعين الأوروبيين.',
                ],
                'order_column' => 3,
            ],
            [
                'title' => [
                    'fr' => 'Accompagnement B2B & Interlocuteur Dédié',
                    'en' => 'Dedicated B2B Project Management',
                    'ar' => 'إدارة مشاريع مخصصة لقطاع الأعمال',
                ],
                'description' => [
                    'fr' => 'Un conducteur de travaux dédié vous accompagne de l’étude technique initiale au procès-verbal de réception sans réserve.',
                    'en' => 'A dedicated site supervisor assists you from initial feasibility studies through to zero-snag handover.',
                    'ar' => 'مدير مشروع مخصص يرافقكم من الدراسة الفنية حتى التسليم النهائي للمشروع.',
                ],
                'order_column' => 4,
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

        // 5. Services
        $service1 = Service::create([
            'title' => [
                'fr' => 'Résines Industrielles & Époxy',
                'en' => 'Industrial Epoxy & Polyurethane Resin',
                'ar' => 'أرضيات الراتنج الصناعي والإيبوكسي',
            ],
            'slug' => [
                'fr' => 'resines-industrielles-epoxy',
                'en' => 'industrial-epoxy-resin',
                'ar' => 'industrial-epoxy-resin',
            ],
            'overview' => [
                'fr' => '<p>Revêtements coulés sans joints, haute performance mécanique et chimique, classement UPEC élevé pour entrepôts, parkings, showrooms et laboratoires.</p>',
                'en' => '<p>Seamless cast floor systems with high mechanical and chemical performance, ideal for warehouses, parking decks, showrooms, and tech facilities.</p>',
                'ar' => '<p>أرضيات سائلة بدون فواصل ذات مقاومة استثنائية للأوزان والمواد الكيميائية للمستودعات ومواقف السيارات والصالات.</p>',
            ],
            'image' => 'images/service_resin.jpg',
            'order_column' => 1,
            'is_published' => true,
        ]);

        $service2 = Service::create([
            'title' => [
                'fr' => 'Parquets Nobles & Pose en Point de Hongrie',
                'en' => 'Prestige Hardwood & Chevron Parquet',
                'ar' => 'الباركيه الفرنسي الفاخر ونقشة الشفرون',
            ],
            'slug' => [
                'fr' => 'parquets-nobles-point-de-hongrie',
                'en' => 'prestige-hardwood-chevron-parquet',
                'ar' => 'prestige-hardwood-chevron-parquet',
            ],
            'overview' => [
                'fr' => '<p>Fourniture et pose de parquets massifs et contrecollés d’exception en chêne de France. Spécialistes des poses traditionnelles : point de Hongrie, bâton rompu et lames larges.</p>',
                'en' => '<p>Supply and installation of premium French oak solid and engineered hardwood flooring. Specialists in chevron, herringbone, and grand plank patterns.</p>',
                'ar' => '<p>توريد وتركيب أرقى أنواع خشب البلوط الفرنسي بأنماط الشفرون والهيرنغبون الكلاسيكية للمشاريع الراقية.</p>',
            ],
            'image' => 'images/service_hardwood.jpg',
            'order_column' => 2,
            'is_published' => true,
        ]);

        $service3 = Service::create([
            'title' => [
                'fr' => 'Panneaux Muraux Acoustiques & Habillages',
                'en' => 'Acoustic Wall Panels & Architectural Cladding',
                'ar' => 'الألواح الجدارية العازلة للصوت والتكسيات المعمارية',
            ],
            'slug' => [
                'fr' => 'panneaux-muraux-acoustiques',
                'en' => 'acoustic-wall-panels-cladding',
                'ar' => 'acoustic-wall-panels-cladding',
            ],
            'overview' => [
                'fr' => '<p>Solutions d’absorption acoustique design composées de tasseaux de bois véritable sur feutre absorbant. Idéal pour salles de réunion, auditoriums et halls tertiaires.</p>',
                'en' => '<p>Architectural acoustic slatted timber panels on recycled acoustic felt. Enhances acoustic comfort and aesthetic sophistication for corporate spaces.</p>',
                'ar' => '<p>حلول عزل صوتي متطورة بشرائح خشبية فاخرة لتوفير الهدوء والجمال في قاعات الاجتماعات والمكاتب.</p>',
            ],
            'image' => 'images/service_acoustic.jpg',
            'order_column' => 3,
            'is_published' => true,
        ]);

        $service4 = Service::create([
            'title' => [
                'fr' => 'Sols Souples LVT & Moquettes Dalles Tertiaires',
                'en' => 'Commercial LVT & Modular Carpet Tiles',
                'ar' => 'الأرضيات المرنة والفينيل وبلاط الموكيت المكتبي',
            ],
            'slug' => [
                'fr' => 'sols-souples-lvt-moquette',
                'en' => 'commercial-lvt-carpet-tiles',
                'ar' => 'commercial-lvt-carpet-tiles',
            ],
            'overview' => [
                'fr' => '<p>Pose de dalles et lames PVC plombantes (LVT) et moquettes en dalles techniques à haute efficacité phonique pour plateaux de bureaux et espaces tertiaires à fort trafic.</p>',
                'en' => '<p>Precision installation of loose-lay luxury vinyl tiles (LVT) and heavy commercial carpet tiles for acoustic comfort in busy open-plan offices.</p>',
                'ar' => '<p>تركيب أرضيات الفينيل الفاخر والموكيت المكتبي المصمم لتحمل الاستخدام الشديد والعزل الصوتي.</p>',
            ],
            'image' => 'images/service_lvt.jpg',
            'order_column' => 4,
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
        $proj1->services()->attach([$service1->id]);

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
