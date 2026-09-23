<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Sermon;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update Default Admin User
        User::updateOrCreate(
            ['email' => 'admin@dioceseofjalle.org'],
            [
                'name' => 'Diocese Administrator',
                'password' => Hash::make('Password123!'),
            ]
        );

        // 2. Initial Posts
        Post::updateOrCreate(
            ['slug' => 'bishop-abraham-matiop-pastoral-tour-jalle'],
            [
                'title' => 'Bishop Abraham Matiop Conducts Pastoral Tour of Jalle Parishes',
                'category' => 'Episcopal Ministry',
                'excerpt' => 'Confirming over 80 candidates, meeting with community elders, and calling for peace and unity among families in Jonglei.',
                'content' => "<p>JALLE PAYAM, BOR COUNTY — The Bishop of the Diocese of Jalle, Rt. Rev. Abraham Matiop Deng Kechdit, has concluded an extensive five-day pastoral tour across rural parishes in Jalle Payam.</p><p>During the visitation, Bishop Abraham confirmed more than 80 candidates into full communion with the Episcopal Church of South Sudan, administered Holy Communion, and met with local community elders, women leaders from the Mothers' Union, and youth delegations.</p><h4>Upholding Peace and Reconciliation</h4><p>Speaking during an open-air service under the trees in Jalle, Bishop Abraham emphasized the indispensable role of the Church in mediating peace and healing wounds: 'Our people have weathered immense trials, including severe seasonal floods and displacement. Yet, Christ remains our steady foundation. We urge all families to walk in forgiveness, support one another, and protect the peace of our land.'</p>",
                'image' => 'assets/img/diocese/bishop-and-clergy.jpeg',
                'author' => 'Diocesan Communication Desk',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'mothers-union-community-literacy-faith-project'],
            [
                'title' => "Mothers' Union Launches Community Literacy and Faith Project",
                'category' => "Mothers' Union",
                'excerpt' => 'Empowering women with reading skills, Bible study curriculum, and small poultry husbandry to support rural livelihoods in Bor County.',
                'content' => "<p>Hundreds of women from the Mothers' Union (MU) in the Diocese of Jalle gathered to inaugurate an adult literacy and Christian family discipleship campaign.</p><p>The project provides basic English and Dinka literacy classes, scripture reflection guides, and vocational tailoring workshops. The Diocesan MU President remarked, 'When you empower a Christian mother with literacy and faith, you strengthen the entire household and secure a brighter future for our children.'</p>",
                'image' => 'assets/img/diocese/mothers-union.jpeg',
                'author' => "Mothers' Union Desk",
                'is_published' => true,
                'published_at' => now()->subDays(10),
            ]
        );

        Post::updateOrCreate(
            ['slug' => 'diocese-mobilizes-emergency-flood-relief'],
            [
                'title' => 'Diocese Mobilizes Emergency Relief for Flood Victims in Bor County',
                'category' => 'Humanitarian Relief',
                'excerpt' => 'Partnering with humanitarian friends and diaspora Christians to provide staple flour, mosquito nets, and clean water tablets.',
                'content' => "<p>In response to devastating seasonal flooding from the White Nile affecting communities across Jalle Payam, the Diocese of Jalle has mobilized emergency humanitarian aid.</p><p>Diocesan volunteers and youth teams are distributing maize flour, clean drinking water purifiers, and temporary sheltering tarpaulins to displaced families seeking refuge near parish centers.</p>",
                'image' => 'assets/img/diocese/fellowship-assembly.jpeg',
                'author' => 'Diocesan Relief Committee',
                'is_published' => true,
                'published_at' => now()->subDays(20),
            ]
        );

        // 3. Initial Sermons
        Sermon::updateOrCreate(
            ['slug' => 'overcoming-evil-with-love-and-peace'],
            [
                'title' => 'Overcoming Evil with Love and Peace',
                'preacher' => 'Rt. Rev. Bishop Abraham Matiop Deng',
                'scripture' => 'Romans 12:9-21',
                'sermon_date' => now()->subDays(5),
                'description' => 'A powerful pastoral message urging believers to cling to what is good, love sincerely, and pursue reconciliation across our land.',
                'notes' => "1. Love Must Be Sincere (v. 9)\n2. Faithful in Prayer, Patient in Affliction (v. 12)\n3. Living in Harmony with All (v. 18)\n\n'Do not be overcome by evil, but overcome evil with good.' — Romans 12:21",
                'image' => 'assets/img/diocese/bishop-preaching.jpeg',
            ]
        );

        Sermon::updateOrCreate(
            ['slug' => 'god-is-our-refuge-and-strength'],
            [
                'title' => 'God Is Our Refuge and Strength',
                'preacher' => 'Venerable Archdeacon of Jalle',
                'scripture' => 'Psalm 46:1-7',
                'sermon_date' => now()->subDays(12),
                'description' => 'Spiritual reassurance for families navigating hardship, displacement, and flooding: God is our fortress.',
                'notes' => "'God is our refuge and strength, an ever-present help in trouble.' We take comfort in the sovereign protection of Almighty God.",
                'image' => 'assets/img/diocese/fellowship-assembly.jpeg',
            ]
        );

        // 4. Initial Events
        Event::updateOrCreate(
            ['slug' => 'annual-diocesan-synod-2026'],
            [
                'title' => 'Annual Diocesan Synod 2026',
                'location' => 'Diocesan Center, Jalle Payam',
                'start_date' => now()->addDays(20),
                'end_date' => now()->addDays(23),
                'description' => 'Clergy, Mothers\' Union delegates, and parish representatives gather under the presidency of Bishop Abraham Matiop to deliberate on diocesan vision and ministry.',
                'image' => 'assets/img/diocese/clergy-full-group.jpeg',
                'contact_person' => 'Diocesan Secretary (info@dioceseofjalle.org)',
                'is_featured' => true,
            ]
        );

        Event::updateOrCreate(
            ['slug' => 'diocesan-mothers-union-convention'],
            [
                'title' => "Diocesan Mothers' Union Annual Convention",
                'location' => 'St. Peter Parish, Jalle',
                'start_date' => now()->addDays(45),
                'end_date' => now()->addDays(48),
                'description' => 'A gathering of women from all archdeaconries for spiritual renewal, family development workshops, and fellowship.',
                'image' => 'assets/img/diocese/mothers-union.jpeg',
                'contact_person' => 'Mothers\' Union Coordinator',
                'is_featured' => true,
            ]
        );

        // Completed / Past Event for testing status badges
        Event::updateOrCreate(
            ['slug' => 'jonglei-peace-reconciliation-summit-2026'],
            [
                'title' => 'Jonglei Peace & Community Reconciliation Summit',
                'location' => 'Jalle Payam Peace Center',
                'start_date' => now()->subDays(30),
                'end_date' => now()->subDays(28),
                'description' => 'A historic gathering of church leaders, payam chiefs, and youth representatives to foster inter-community harmony, forgiveness, and lasting peace.',
                'image' => 'assets/img/diocese/fellowship-assembly.jpeg',
                'contact_person' => 'Peace & Reconciliation Desk',
                'is_featured' => false,
            ]
        );

        // Initial Gallery Photos
        \App\Models\Gallery::updateOrCreate(
            ['title' => 'Bishop Abraham Matiop with Diocesan Clergy Assembly'],
            [
                'category' => 'Episcopal Ministry',
                'image' => 'assets/img/diocese/bishop-and-clergy.jpeg',
                'caption' => 'Rt. Rev. Abraham Matiop Deng Kechdit presiding over the diocesan pastoral clergy assembly in Jalle.',
                'event_date' => now()->subDays(15),
                'is_published' => true,
                'sort_order' => 1,
            ]
        );

        \App\Models\Gallery::updateOrCreate(
            ['title' => 'Mothers\' Union Prayer & Fellowship Day'],
            [
                'category' => 'Mothers\' Union',
                'image' => 'assets/img/diocese/mothers-union.jpeg',
                'caption' => 'Mothers\' Union members gathered in praise, prayer, and family discipleship.',
                'event_date' => now()->subDays(25),
                'is_published' => true,
                'sort_order' => 2,
            ]
        );

        \App\Models\Gallery::updateOrCreate(
            ['title' => 'Parish Worship and Confirmation Candidates'],
            [
                'category' => 'Worship & Choir',
                'image' => 'assets/img/diocese/choir-and-procession.jpeg',
                'caption' => 'Choir procession leading the Sunday Eucharist service in Jalle Payam.',
                'event_date' => now()->subDays(40),
                'is_published' => true,
                'sort_order' => 3,
            ]
        );

        \App\Models\Gallery::updateOrCreate(
            ['title' => 'Youth Fellowship & Scripture Outreach'],
            [
                'category' => 'Youth',
                'image' => 'assets/img/diocese/youth-fellowship.jpeg',
                'caption' => 'Young people gathered for youth fellowship, praise songs, and Bible study.',
                'event_date' => now()->subDays(50),
                'is_published' => true,
                'sort_order' => 4,
            ]
        );

        \App\Models\Gallery::updateOrCreate(
            ['title' => 'Parish Congregation Gathered in Fellowship'],
            [
                'category' => 'Community Fellowship',
                'image' => 'assets/img/diocese/fellowship-assembly.jpeg',
                'caption' => 'The faithful gathered for outdoor Sunday worship and parish prayers under the shade of trees.',
                'event_date' => now()->subDays(60),
                'is_published' => true,
                'sort_order' => 5,
            ]
        );
    }
}
