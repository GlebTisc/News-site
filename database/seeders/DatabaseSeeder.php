<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Category::factory()->create([
            "name" => "tennis news"
        ])->create([
            "name" => "tech news"
        ])->create([
            "name" => "fashion"
        ])->create([
            "name" => "sport news"
        ]);

        News::factory()->create([
            "category_id" => 1,
            "heading" => "Djokovic Faces Backlash Over Controversial Comments",
            "date" => \date("2025.01.20"),
            "content" => "Novak Djokovic has found himself at the center of
                         controversy once again after making comments that many have deemed disrespectful.
                         During a post-match interview at the Australian Open, Djokovic suggested that tennis
                         should adopt more entertainment elements similar to the NBA and NFL. His remarks
                         have sparked a heated debate among fans and players alike, with some supporting his
                         vision for a more engaging sport, while others criticize him for undermining the traditional
                         values of tennis",
            "image" => "images/square_1280_00edaf7cc9aa7d5972b9380f30282992.jpg"
        ])->create([
            "category_id" => 1,
            "heading" => "Elon Musk Supports Djokovic Amidst Australian Open Drama",
            "date" => \date("2025.01.20"),
            "content" => "In an unexpected turn of events, tech mogul Elon Musk has voiced his support for
                          Novak Djokovic following the recent controversy at the Australian Open. Djokovic
                          refused to participate in a post-match interview after Channel Nine's Tony Jones made
                          disparaging remarks about him and his fans. Musk took to social media to back Djokovic,
                           stating that it's better to communicate directly with the public rather than through
                           traditional media channels",
            "image" => "images/square_1280_ec6249ddf4ddcd2a01cbb5dc4d96360f.jpg"
        ])->create([
            "category_id" => 1,
            "heading" => "Jessica Pegula Defends Djokovic's Vision for Tennis",
            "date" => \date("2025.01.20"),
            "content" => "Jessica Pegula, the world's richest tennis player, has come to Novak Djokovic's defense
                          after his recent comments about modernizing tennis. Pegula, whose family owns the NFL's
                          Buffalo Bills, agrees with Djokovic's idea of incorporating entertainment elements into
                          tennis to attract younger audiences. She believes that such changes could help the sport
                          stay relevant and engaging in the face of rising competition from other racket sports"
        ])->create([
            "category_id" => 1,
            "heading" => "Victoria Azarenka Criticizes Tony Jones for Disrespecting Djokovic",
            "date" => \date("2025.01.20"),
            "content" => "Former world No. 1 Victoria Azarenka has joined the chorus of voices condemning
                          Tony Jones for his disrespectful comments about Novak Djokovic. Jones, a Channel
                          Nine broadcaster, mocked Djokovic and his fans during a live segment at the
                          Australian Open. Azarenka took to social media to express her outrage, calling
                           Jones's behavior insane and demanding an apology on behalf of the tennis
                           community."
        ])->create([
            "category_id" => 2,
            "heading" => "Tech Billionaires Attend Trump's Inauguration",
            "date" => \date("2025.02.25"),
            "content" => "Prominent tech billionaires, including Mark Zuckerberg, Lauren Sanchez, Jeff Bezos,
                          Sundar Pichai, and Elon Musk, attended Donald Trump's inauguration in Washington,
                          D.C. The event highlighted the growing influence of tech leaders in political
                          circles",
            "image" => "images/tech.webp"
        ])->create([
            "category_id" => 2,
            "heading" => "Elon Musk's Mars Mission Gets Presidential Endorsement",
            "date" => \date("2025.02.25"),
            "content" => "During his inaugural address, President Donald Trump promised to pursue the goal
                          of sending American astronauts to Mars, a long-time ambition of SpaceX CEO Elon
                          Musk. Musk expressed his excitement and support for the mission, marking a
                          significant milestone in space exploration",
            "image" => "images/square_1280_ec6249ddf4ddcd2a01cbb5dc4d96360f.jpg"
        ])->create([
            "category_id" => 2,
            "heading" => "Tech Giants Shift Political Allegiances",
            "date" => \date("2025.01.20"),
            "content" => "Many tech leaders, including Sam Altman, Mark Zuckerberg, and Jeff Bezos,
                          have shifted their political support towards the Republican Party. This change
                          comes after years of strained relations with Democratic lawmakers, who have been
                          critical of Big Tech's influence and practices"
        ])->create([
            "category_id" => 2,
            "heading" => "Nintendo Announces Switch 2 Console",
            "date" => \date("2025.01.20"),
            "content" => "Nintendo has officially revealed the long-awaited Switch 2 console, set to
                          launch later this year. The new console promises enhanced performance, improved graphics,
                          and a host of new features, exciting gamers worldwide"
        ])->create([
            "category_id" => 3,
            "heading" => "Melania Trump Makes a Statement at Inauguration",
            "date" => \date("2025.02.25"),
            "content" => "Fashion was front and center at Donald Trump’s second presidential inauguration.
                          Melania Trump turned heads with her choice of a navy blue ensemble by American
                          designers Adam Lippes and Eric Javits. The First Lady's outfit, curated by
                          stylist Herve Pierre, featured a long navy coat and a coordinating wide-brim hat.
                          Her look was completed with black leather gloves and dark blue suede Manolo
                          Blahnik pumps",
            "image" => "images/a0b477e44c392e4e137e530757e41380.jpg"
        ])->create([
            "category_id" => 3,
            "heading" => "Zendaya Stuns in Jessica McCormack Jewelry",
            "date" => \date("2025.02.25"),
            "content" => "Zendaya has once again proven her status as a fashion icon by donning Jessica
                          McCormack jewelry at a recent event. The actress's choice of elegant and timeless
                          pieces has set a new trend in the fashion world, with many fans and fashion
                          enthusiasts eager to emulate her style",
            "image" => "images/pict1.webp"
        ])->create([
            "category_id" => 3,
            "heading" => "Ralph Lauren's Purple Ensemble Worn by Jill Biden",
            "date" => \date("2025.02.25"),
            "content" => "In a show of bipartisan unity, former First Lady Jill Biden wore an all-purple
                          ensemble by Ralph Lauren at Donald Trump's second inauguration.
                          The monochromatic look included a double-breasted coat, coordinating gloves,
                          and heels, making a powerful fashion statement",
            "image" => "images/fashion-modern-logo.jpg"
        ])->create([
            "category_id" => 4,
            "heading" => "Serena Williams Announces Retirement from Professional Tennis",
            "date" => \date("2025.02.25"),
            "content" => "Tennis legend Serena Williams has officially announced her retirement from
                          professional tennis. In an emotional press conference, Williams expressed her
                          gratitude to her fans, family, and fellow players for their support throughout
                          her illustrious career. With 23 Grand Slam singles titles to her name, Williams
                          leaves behind a legacy as one of the greatest athletes of all time."
        ])->create([
            "category_id" => 4,
            "heading" => "Lionel Messi Scores Hat-Trick in Champions League Final",
            "date" => \date("2025.02.25"),
            "content" => "In a stunning display of skill and determination, Lionel Messi scored a hat-trick
                          to lead his team to victory in the Champions League final. The match, held at
                          Wembley Stadium, saw Messi's team triumph over their rivals with a final score
                          of 4-2. This victory marks Messi's fifth Champions League title, further
                          cementing his status as one of the greatest footballers in history.",
            "image" => "images/funny.webp"
        ]);

        Video::create([
            'heading' => "Wonders of the Wild: Exploring Earth's Untamed Beauty",
            'source' => "videos/854923-hd_1920_1080_25fps.mp4",
            'date' => \date("2025.10.10")
        ]);

        Video::create([
            'heading' => "Nature's Symphony: The Sounds and Sights of the Great Outdoors",
            'source' => "videos/3129671-uhd_3840_2160_30fps.mp4",
            'date' => \date("2025.10.10")
        ]);

        Video::create([
            'heading' => "Journey Through the Seasons: A Year in Nature's Splendor",
            'source' => "videos/6981411-hd_1920_1080_25fps.mp4",
            'date' => \date("2025.10.10")
        ]);
    }
}
