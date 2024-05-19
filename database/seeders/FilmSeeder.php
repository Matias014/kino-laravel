<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Film::insert([
            [
                'NAME' => 'Avengers: Koniec gry',
                'DESCRIPTION' => 'Po niszczących wydarzeniach Avengers: Wojna bez granic, wszechświat jest w ruinie. Z pomocą pozostałych sojuszników Avengers zbierają się ponownie, aby odwrócić działania Thanosa i przywrócić równowagę wszechświata.',
                'DURATION' => '181',
                'GENRE' => 'Akcja, Przygodowy, Dramat',
                'IMG' => 'avengers_endgame.jpg'
            ],
            [
                'NAME' => 'Batman',
                'DESCRIPTION' => 'Mroczny Rycerz Gotham City rozpoczyna swoją wojnę z przestępczością, a jego pierwszym głównym wrogiem jest zabójczy klaun Joker.',
                'DURATION' => '126',
                'GENRE' => 'Akcja, Przygodowy',
                'IMG' => 'batman.jpg'
            ],
            [
                'NAME' => 'Incepcja',
                'DESCRIPTION' => 'Złodziej, który kradnie tajemnice korporacyjne za pomocą technologii dzielenia się snami, dostaje odwrotne zadanie - wszczepić pomysł do umysłu C.E.O.',
                'DURATION' => '148',
                'GENRE' => 'Akcja, Przygodowy, Sci-Fi',
                'IMG' => 'inception.jpg'
            ],
            [
                'NAME' => 'Interstellar',
                'DESCRIPTION' => 'Zespół odkrywców podróżuje przez tunel czasoprzestrzenny w kosmosie, aby zapewnić przetrwanie ludzkości.',
                'DURATION' => '169',
                'GENRE' => 'Przygodowy, Dramat, Sci-Fi',
                'IMG' => 'interstellar.jpg'
            ],
            [
                'NAME' => 'Skazani na Shawshank',
                'DESCRIPTION' => 'Dwóch więźniów zaprzyjaźnia się na przestrzeni lat, znajdując ukojenie i ostateczne odkupienie poprzez akty powszechnej przyzwoitości.',
                'DURATION' => '142',
                'GENRE' => 'Dramat',
                'IMG' => 'shawshank.jpg'
            ],
            [
                'NAME' => 'Avatar',
                'DESCRIPTION' => 'Paraplegiczny żołnierz jest wysyłany na księżyc Pandora na unikalną misję, ale staje przed dylematem między przestrzeganiem rozkazów a ochroną nowego świata.',
                'DURATION' => '162',
                'GENRE' => 'Akcja, Przygodowy, Sci-Fi',
                'IMG' => 'avatar.jpg'
            ],
            [
                'NAME' => 'Bękarty wojny',
                'DESCRIPTION' => 'W okupowanej przez nazistów Francji grupa żydowskich żołnierzy przeprowadza skoordynowane operacje partyzanckie przeciwko Niemcom.',
                'DURATION' => '153',
                'GENRE' => 'Przygodowy, Dramat, Wojenny',
                'IMG' => 'inglourious_basterds.jpg'
            ],
            [
                'NAME' => 'Blade Runner 2049',
                'DESCRIPTION' => 'Nowy blade runner odkrywa dawno skrywaną tajemnicę, która może pogrążyć to, co pozostało z społeczeństwa, w chaosie.',
                'DURATION' => '164',
                'GENRE' => 'Sci-Fi, Thriller',
                'IMG' => 'blade_runner_2049.jpg'
            ],
            [
                'NAME' => 'Bohemian Rhapsody',
                'DESCRIPTION' => 'Biografia legendarnego zespołu rockowego Queen i ich wokalisty, Freddiego Mercury\'ego, prowadząca do słynnego występu na Live Aid w 1985 roku.',
                'DURATION' => '134',
                'GENRE' => 'Biograficzny, Dramat, Muzyczny',
                'IMG' => 'bohemian_rhapsody.jpg'
            ],
            [
                'NAME' => 'Django',
                'DESCRIPTION' => 'Wyzwolony niewolnik sprzymierza się z niemieckim łowcą nagród, aby uratować swoją żonę z rąk brutalnego właściciela plantacji.',
                'DURATION' => '165',
                'GENRE' => 'Dramat, Western',
                'IMG' => 'django.jpg'
            ],
            [
                'NAME' => 'Dunkierka',
                'DESCRIPTION' => 'Alianci z Belgii, Imperium Brytyjskiego i Francji są otoczeni przez niemiecką armię i ewakuowani podczas zaciekłej bitwy pod Dunkierką.',
                'DURATION' => '106',
                'GENRE' => 'Akcja, Dramat, Historia',
                'IMG' => 'dunkirk.jpg'
            ],
            [
                'NAME' => 'Dystrykt 9',
                'DESCRIPTION' => 'Nieludzcy obcy muszą żyć w warunkach przypominających slumsy na Ziemi, ale jeden z nich niespodziewanie odkrywa, jak może pomóc swoim współziomkom.',
                'DURATION' => '112',
                'GENRE' => 'Akcja, Sci-Fi, Thriller',
                'IMG' => 'district_9.jpg'
            ],
            [
                'NAME' => 'Faceci w czerni',
                'DESCRIPTION' => 'Agenci tajnej organizacji śledzącej i regulującej życie obcych na Ziemi muszą powstrzymać zagrożenie dla planety.',
                'DURATION' => '98',
                'GENRE' => 'Akcja, Przygodowy, Komedia',
                'IMG' => 'men_in_black.jpg'
            ],
            [
                'NAME' => 'Furia',
                'DESCRIPTION' => 'Załoga amerykańskiego czołgu stawia czoła trudnościom w ostatnich dniach II wojny światowej.',
                'DURATION' => '134',
                'GENRE' => 'Akcja, Dramat, Wojenny',
                'IMG' => 'fury.jpg'
            ],
            [
                'NAME' => 'Gwiezdne wojny: część III - Zemsta Sithów',
                'DESCRIPTION' => 'Anakin Skywalker zostaje skuszony przez mroczną stronę Mocy i staje się Darth Vaderem, ale Jedi walczą o przetrwanie.',
                'DURATION' => '140',
                'GENRE' => 'Akcja, Przygodowy, Sci-Fi',
                'IMG' => 'star_wars_ep_iii.jpg'
            ],
            [
                'NAME' => 'Jak wytresować smoka',
                'DESCRIPTION' => 'Młody Wiking, który chce walczyć ze smokami, zaprzyjaźnia się z młodym smokiem i uczy się, że mogą być bardziej wartościowi niż sądzono.',
                'DURATION' => '98',
                'GENRE' => 'Animacja, Przygodowy, Familijny',
                'IMG' => 'how_to_train_your_dragon.jpg'
            ],
            [
                'NAME' => 'Król Lew',
                'DESCRIPTION' => 'Młody lew Simba zostaje wygnany po śmierci swojego ojca i musi dorosnąć, aby odzyskać swoje królestwo.',
                'DURATION' => '88',
                'GENRE' => 'Animacja, Przygodowy, Dramat',
                'IMG' => 'lion_king.jpg'
            ],
            [
                'NAME' => 'Marsjanin',
                'DESCRIPTION' => 'Astronauta zostaje przypadkowo pozostawiony na Marsie i musi wykorzystać swoją inteligencję, aby przetrwać i znaleźć sposób na powrót na Ziemię.',
                'DURATION' => '144',
                'GENRE' => 'Przygodowy, Dramat, Sci-Fi',
                'IMG' => 'martian.jpg'
            ],
            [
                'NAME' => 'Matrix',
                'DESCRIPTION' => 'Haker odkrywa, że rzeczywistość, w której żyje, jest wirtualną symulacją stworzona przez maszyny i dołącza do rebelii, aby ją zniszczyć.',
                'DURATION' => '136',
                'GENRE' => 'Akcja, Sci-Fi',
                'IMG' => 'matrix.jpg'
            ],
            [
                'NAME' => 'Ratatuj',
                'DESCRIPTION' => 'Szczur o imieniu Remy marzy o zostaniu wielkim szefem kuchni i nawiązuje niezwykłą współpracę z młodym kucharzem w prestiżowej restauracji.',
                'DURATION' => '111',
                'GENRE' => 'Animacja, Przygodowy, Komedia',
                'IMG' => 'ratatouille.jpg'
            ],
            [
                'NAME' => 'Sherlock Holmes',
                'DESCRIPTION' => 'Detektyw Sherlock Holmes i jego partner Watson rozwiązują sprawy kryminalne i zwalczają niebezpiecznych przestępców w Londynie.',
                'DURATION' => '128',
                'GENRE' => 'Akcja, Przygodowy, Kryminał',
                'IMG' => 'sherlock_holmes.jpg'
            ],
            [
                'NAME' => 'Strażnicy Galaktyki',
                'DESCRIPTION' => 'Grupa międzygwiezdnych outsiderów musi zjednoczyć się, aby powstrzymać potężnego przeciwnika przed zniszczeniem galaktyki.',
                'DURATION' => '121',
                'GENRE' => 'Akcja, Przygodowy, Komedia',
                'IMG' => 'guardians_of_the_galaxy.jpg'
            ],
            [
                'NAME' => 'Szybcy i wściekli',
                'DESCRIPTION' => 'Podziemny świat nielegalnych wyścigów samochodowych i misje pełne akcji oraz adrenaliny.',
                'DURATION' => '107',
                'GENRE' => 'Akcja, Kryminał, Thriller',
                'IMG' => 'fast_and_furious.jpg'
            ],
            [
                'NAME' => 'Titanic',
                'DESCRIPTION' => 'Romans między młodą arystokratką a biednym artystą na pokładzie luksusowego statku, który zmierza ku tragedii.',
                'DURATION' => '195',
                'GENRE' => 'Dramat, Romans',
                'IMG' => 'titanic.jpg'
            ],
            [
                'NAME' => 'WALL-E',
                'DESCRIPTION' => 'Robot odpowiedzialny za sprzątanie Ziemi z odpadków odkrywa nowy cel życia, gdy spotyka nowoczesnego robota zwiadowczego, Evę.',
                'DURATION' => '98',
                'GENRE' => 'Animacja, Przygodowy, Familijny',
                'IMG' => 'wall_e.jpg'
            ],
            [
                'NAME' => 'Więzień labiryntu',
                'DESCRIPTION' => 'Nastoletni chłopak budzi się w tajemniczym labiryncie bez pamięci o swoim poprzednim życiu i musi połączyć siły z innymi, aby znaleźć wyjście.',
                'DURATION' => '113',
                'GENRE' => 'Akcja, Sci-Fi, Thriller',
                'IMG' => 'maze_runner.jpg'
            ]
        ]);
    }
}
