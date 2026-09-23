<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function churches()
    {
        return view('pages.churches');
    }

    public function leadership()
    {
        return view('pages.leadership');
    }

    public function bishop()
    {
        return view('pages.bishop');
    }

    public function clergyDetail($slug)
    {
        $clergyProfiles = [
            'canon-michael-makuol' => [
                'name' => 'Venerable Canon Michael Makuol Garang',
                'title' => "Bishop's Commissioner",
                'ecss_title' => 'Dean & Senior Episcopal Commissioner',
                'image' => 'assets/img/diocese/micheal.jpeg',
                'bio' => 'Canon Michael Makuol Garang serves as the primary administrative and episcopal commissioner for the Diocese of Jalle, assisting the Diocesan Bishop in diocesan governance, parish pastoral oversight, synod planning, and diocesan representation across the Jonglei Internal Province.',
                'scripture' => '1 Corinthians 4:2 — "Now it is required that those who have been given a trust must prove faithful."',
                'responsibilities' => [
                    'Diocesan Administrative Direction and episcopal coordination.',
                    'Parish visitation, conflict mediation, and clergy mentoring.',
                    'Liaison with the ECSS Jonglei Internal Provincial Secretariat.',
                    'Coordination of Diocesan Councils and Synod Assemblies.'
                ]
            ],
            'canon-michael-makuol-garang' => [
                'name' => 'Venerable Canon Michael Makuol Garang',
                'title' => "Bishop's Commissioner",
                'ecss_title' => 'Dean & Senior Episcopal Commissioner',
                'image' => 'assets/img/diocese/micheal.jpeg',
                'bio' => 'Canon Michael Makuol Garang serves as the primary administrative and episcopal commissioner for the Diocese of Jalle, assisting the Diocesan Bishop in diocesan governance, parish pastoral oversight, synod planning, and diocesan representation across the Jonglei Internal Province.',
                'scripture' => '1 Corinthians 4:2 — "Now it is required that those who have been given a trust must prove faithful."',
                'responsibilities' => [
                    'Diocesan Administrative Direction and episcopal coordination.',
                    'Parish visitation, conflict mediation, and clergy mentoring.',
                    'Liaison with the ECSS Jonglei Internal Provincial Secretariat.',
                    'Coordination of Diocesan Councils and Synod Assemblies.'
                ]
            ],
            'archdeacon-samuel-akuak' => [
                'name' => 'Venerable Archdeacon Samuel Akuak',
                'title' => 'Secretary of Diocese',
                'ecss_title' => 'Diocesan Secretary & Archdeacon of Jalle',
                'image' => 'assets/img/diocese/samuel.jpeg',
                'bio' => 'Archdeacon Samuel Akuak coordinates the central secretariat of the Diocese of Jalle, managing communications, registry of baptisms, confirmations, and ordinations, as well as pastoral correspondence across all archdeaconries and parishes.',
                'scripture' => 'Colossians 3:23 — "Whatever you do, work at it with all your heart, as working for the Lord, not for human masters."',
                'responsibilities' => [
                    'Management of the Diocesan Secretariat and official archives.',
                    'Parochial returns, clergy licensing, and diocesan registers.',
                    'Coordination of humanitarian relief documentation with community leaders.',
                    'Logistical coordination for episcopal tours and lectionary materials.'
                ]
            ],
            'mothers-union-president' => [
                'name' => 'Mama Rebecca Yar Deng',
                'title' => 'Diocesan Mothers\' Union President',
                'ecss_title' => 'President, Mothers\' Union — Diocese of Jalle',
                'image' => 'assets/img/diocese/mothers-union.jpeg',
                'bio' => 'Mama Rebecca Yar leads the Mothers\' Union across all parishes in the Diocese of Jalle, empowering Christian mothers, organizing women\'s literacy circles, facilitating family prayer ministries, and spearheading compassionate outreach to vulnerable households.',
                'scripture' => 'Proverbs 31:26 — "She speaks with wisdom, and faithful instruction is on her tongue."',
                'responsibilities' => [
                    'Spiritual leadership and discipleship for Christian families.',
                    'Parish MU branch establishment and leadership conferences.',
                    'Women\'s adult literacy, tailoring, and micro-husbandry initiatives.',
                    'Hospital and home visitations for sick and bereaved parish members.'
                ]
            ],
            'youth-director' => [
                'name' => 'Pastor Daniel Malual',
                'title' => 'Diocesan Youth & Praise Coordinator',
                'ecss_title' => 'Youth Director — Diocese of Jalle',
                'image' => 'assets/img/diocese/youth-fellowship.jpeg',
                'bio' => 'Pastor Daniel Malual spearheads youth mobilization, gospel music festivals, Bible quizzes, and sports outreach programs designed to engage young men and women in godliness, education, and peacebuilding.',
                'scripture' => '1 Timothy 4:12 — "Don\'t let anyone look down on you because you are young, but set an example for the believers in speech, in conduct, in love, in faith and in purity."',
                'responsibilities' => [
                    'Organizing inter-parish youth revivals, retreats, and choir competitions.',
                    'Vocational mentorship and Christian leadership training.',
                    'Sports for Peace evangelism tournaments across Jalle Payam.',
                    'Digital lectionary engagement and youth music development.'
                ]
            ]
        ];

        if (!array_key_exists($slug, $clergyProfiles)) {
            abort(404);
        }

        $clergy = $clergyProfiles[$slug];
        return view('pages.clergy-detail', compact('clergy', 'slug'));
    }

    public function ministries()
    {
        return view('pages.ministries');
    }

    public function ministryDetail()
    {
        return view('pages.ministry-detail');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function serviceDetail()
    {
        return view('pages.service-detail');
    }

    public function donation()
    {
        return view('pages.donation');
    }

    public function projects()
    {
        return view('pages.projects');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
