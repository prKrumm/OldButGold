<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertIntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Fahrzeugmodell
        DB::table('fzg_modell')->insert(
            array(
                array(
                    'hersteller' => 'Borgward',
                    'modell' => 'Isabella Coupe'
                ),
                array(
                    'hersteller' => 'Opel',
                    'model' => 'Typ 51'
                ),
                array(
                    'hersteller' => 'Bugatti',
                    'model' => 'Typ 55'
                ),
                array(
                    'hersteller' => 'Sonstiges',
                    'model' => 'Sonstiges'
                )
            )
        );
        //Thema
        DB::table('thema')->insert(
            array(
                array(
                    'bezeichnung' => 'Motor'
                ),
                array(
                    'bezeichnung' => 'Blech'
                ),
                array(
                    'bezeichnung' => 'Kotflügel'
                ),
                array(
                    'bezeichnung' => 'Vergaser'
                ),
                array(
                    'bezeichnung' => 'Sonstiges'
                ),
                array(
                    'bezeichnung' => 'Katalysator'
                )
            )
        );

        //Rolle
        DB::table('rolle')->insert(
            array(
                array(
                    'bezeichnung' => 'Händler'
                ),
                array(
                    'bezeichnung' => 'Oldtimer-Besitzer'
                ),
                array(
                    'bezeichnung' => 'Admin'
                )
            )
        );

        //Users
        DB::table('users')->insert(
            array(
                array(
                    'name' => 'Schreiner',
                    'first_name' => 'Viktoria',
                    'user_name' => 'Vk',
                    'email' => 'Viktoria.schreiner@konstanz.de',
                    'password' => 'geheim',
                    'rolle_id' => '1'
                ),
                array(
                    'name' => 'Krumm',
                    'first_name' => 'Patrick',
                    'user_name' => 'PatrickK',
                    'email' => 'Patrick.Krumm@konstanz.de',
                    'password' => 'sehr geheim',
                    'rolle_id' => '1'
                ),
                array(
                    'name' => 'Kaiser',
                    'first_name' => 'Florian',
                    'user_name' => 'FlorianK',
                    'email' => 'Florian.Kaiser@konstanz.de',
                    'password' => 'auch geheim',
                    'rolle_id' => '1'
                ),
                array(
                    'name' => 'Schmidt',
                    'first_name' => 'Hubert',
                    'user_name' => 'Hubbi',
                    'email' => 'Hubbi@schmidt.de',
                    'password' => 'geheim',
                    'rolle_id' => '1'
                ),
                array(
                    'name' => 'Kainzhuber',
                    'first_name' => 'Sigfried',
                    'user_name' => 'Siggi',
                    'email' => 'Siggi@oldies.de',
                    'password' => 'geheim',
                    'rolle_id' => '1'
                ),
                array(
                    'name' => 'Müller',
                    'first_name' => 'Karoline',
                    'user_name' => 'Karo',
                    'email' => 'Karo@mueller.de',
                    'password' => 'geheim',
                    'rolle_id' => '1'
                ),//Admin
                array(
                    'name' => 'Schreiner',
                    'first_name' => 'Viktoria',
                    'user_name' => 'ViktoriaS',
                    'email' => 'Viktoria.Schreiner@konstanz.de',
                    'password' => 'admin',
                    'rolle_id' => '2'
                )
            )
        );

        //Adresse
        DB::table('addresse')->insert(
            array(
                array(
                    'street' => 'Feilitzschstraße 7',
                    'plz' => '80802',
                    'ort' => 'München',
                    'user_id' => 1
                ),
                array(
                    'street' => 'Bodanstraß3 7',
                    'plz' => '78467',
                    'ort' => 'Konstanz',
                    'user_id' => 2
                ),
                array(
                    'street' => 'Sternplatz 1',
                    'plz' => '78467',
                    'ort' => 'Konstanz',
                    'user_id' => 3
                ),
                array(
                    'street' => 'Kreitermeir str. 4',
                    'plz' => '85540',
                    'ort' => 'Haar',
                    'user_id' => 4
                ),
                array(
                    'street' => 'Müllerstraße 1',
                    'plz' => '80802',
                    'ort' => 'München',
                    'user_id' => 5
                ),
                array(
                    'street' => 'Hauptstraße 4',
                    'plz' => '78467',
                    'ort' => 'Stuttgart',
                    'user_id' => 6
                ),
                array(
                    'street' => 'Bahnweg 2',
                    'plz' => '8598',
                    'ort' => 'Bottighofen',
                    'user_id' => 7
                )
            )
        );

        //Frage
        DB::table('frage')->insert(
            array(
                array(
                    'titel' => ' Artikelnummer von Benz umschlüsseln? A 180 411 05 15',
                    'text' => 'Kann mir wer helfen damit? ',
                    'bild_url' => '235klejsrtj@lk4',
                    'fzg_modell_id' => 1,
                    'user_id' => 1
                ),
                array(
                    'titel' => 'Oldi 6vVolt 25/30W wie stelle ich den Motor ab?',
                    'text' => 'Oldi ohne Zündschloß Bosch Zündanlage 6vVolt 25/30W 
                 stelle ich den Motor ab? Elektrik funktioniert über Masse Lichtschalter (Pakelit) hat 
                 4 Stellungen für was brauche ich die Vierte? 
                Ohne Licht, Abblendlicht, Aufblendlicht und ??? Einfacher Schaltplan wäre hilfreich!',
                    'bild_url' => '35klejsrtj@lk4',
                    'fzg_modell_id' => '2',
                    'user_id' => '1'
                ),
                array(
                    'titel' => 'Oldtimer Lackieren?',
                    'text' => 'Ich hätte ein paar Fragen bezüglich der Lackierung von Oldtimern, 
                möchte meinem Vater und seinem Opel Rekord C Coupe eine Freude machen da das 
                Auto schon etwas mitgenommen aussieht. Was würde es kosten solch ein Auto 
                komplett Schwarz lackieren zu lassen, es sind wenige Roststellen vorhanden 
                doch keinerlei Dellen, der Lack löst sich an manchen stellen ab. Kennt 
                vielleicht einer eine empfehlenswerte Autolackiererei in der Umgebung von Hessen ?
                Ich freue mich auf hilfreiche Antworten ',
                    'bild_url' => '35klejsrtj@lk4',
                    'fzg_modell_id' => '1',
                    'user_id' => '2'
                ),
                array(
                    'titel' => 'Rost: Versiegelung ohne komplette Beseitigung? Theorie, und was wirklich hilft.',
                    'text' => 'Hallo Oldtimer-Fans, zugegeben, mein Auto ist (noch *g*) kein Oldtimer. 
                Ich Fahre einen W210, bekannt für Rostprobleme. Mich beschäftigt dieses 
                Thema nun schon länger, und man stößt immer wieder auf widersprüchliche 
                Aussagen und Pauschalantworten zum Thema Rostbeseitigung und -eindämmung, 
                ohne dass diese begründet werden können. Ich dachte, dass ihr mir vielleicht 
                besser helfen könnt.Ich möchte nicht zu sehr ins Detail gehen, und es ist für
                meine Frage auch mehr oder weniger irrelevant;
                Hier soll es sich nur um folgende Frage drehen:
                Ist es möglich, rostende stellen zu versiegeln und am Weiterrosten zu hindern, ohne den Rost vollständig zu entfernen?',
                    'bild_url' => '35klejsrtj@lk4',
                    'fzg_modell_id' => '1',
                    'user_id' => '3'
                ),
                array(
                    'titel' => 'Welche Modifikationen sind zulässig?',
                    'text' => 'Auf der „Oldtimer Classics“ in Lage konnte man einen deutlich modifizierten Ford A Pick-up sehen. 
                Der Hot Rod mit V-8 Motor und hatte ein H-Kennzeichen. Obwohl er deutlich vom Original abwich und nicht 
                einmal Kotflügel montiert waren, hat der TÜV seinen Segen dafür erteilt. Details dazu findet man bei CI.eu ',
                    'bild_url' => '35klejsrtj@lk4',
                    'fzg_modell_id' => '1',
                    'user_id' => '3'
                )
            )
        );


        //Frage_gehoert_Thema
        DB::table('frage_gehoert_thema')->insert(
            array(
                array(
                    'thema_id' => '1',
                    'frage_id' => '1'
                ),
                array(
                    'thema_id' => '1',
                    'frage_id' => '2'
                ),
                array(
                    'thema_id' => '1',
                    'frage_id' => '3'
                ),
                array(
                    'thema_id' => '1',
                    'frage_id' => '4'
                ),
                array(
                    'thema_id' => '4',
                    'frage_id' => '5'
                )
            )
        );

        //Antwort
        DB::table('antwort')->insert(
            array(
                array(
                    'text' => 'Müßte lauf Katalog eine Gelenkscheibe sein. Es zeigt 
                im Microfish aber ein Kreuzgelenk für den 180er.',
                    'frage_id' => 1,
                    'user_id' => 1
                ),
                array(
                    'text' => 'Moin,
Radio Eriwan sagt: im Prinzip ja.
Versiegeln und am Weiterrosten hindern sind eventuell schon zwei verschiedene Themen. 
Daher auch die scheinbar widersprüchlichen Aussagen dazu.Je nach Konstruktion lässt 
sich angerostete Substanz durch verschiedene Maßnahmen weiter erhalten. Der von Dir 
genannte Luftabschluss ist eigentlich nur durch Einbringen von Öl/Fett/Wachs zu erreichen, 
da die Vibrationen alle festen Versiegelungen rissig werden lassen. Feste, tragfähige und 
widerstandsfähige Versiegelungen wie Lack oder Spachtel gehen nur auf rostfreien Flächen, 
daher wird die radikale Entrostung dort empfohlen und es muss eine gute Substanz vorhanden 
sein. Die auch schon von Dir genannten Einschlüsse von Sauerstoff in rostenden Teilen sind 
ein weiteres Argument dafür, so viel Rost wie möglich vor einer Behandlung zu entfernen. 
Behandeln kann dann man mit Rostschutzmitteln wie etwa Mike Sanders oder Timemax 2000.',
                    'frage_id' => 4,
                    'user_id' => 3
                ),
                array(
                    'text' => 'Zum Thema Epoxidharze: geht, aber nur nach vollständiger Rostentfernung. 
                Sonst gammelt es darunter weiter. Na in dem Fall bringt es ja leider nichts. Die Idee war ja, 
                die Sauerstoffzufuhr abzuschneiden. Ich dachte, dass durch die Elastizität keine Risse entstehen, 
                und das Ganze so einen ähnlichen Schutz wie Fette/Wachse bietet.Aber ich gehe mal einfach davon aus, 
                dass es schon längst bekannt wäre, dass man so relativ kostengünstig Rostige stellen "einfrieren" kann. :-/LG',
                    'frage_id' => 4,
                    'user_id' => 3
                ),
                array(
                    'text' => 'Dass ausgerechnet SRAM ne Topfbürste zum "entrosten" empfiehlt stimmt mich schon stutzig. Blattrost 
                wird entfernt, tieferer Rost wird angeschmolzen und verschmiert. Es entsteht eine dunkle, glänzende oberfläche, 
                die vermeintlich Rostfrei aussieht, aber im grunde nur so vom Rost überzogen ist. Wirklich weg bekommt man Rost 
                nur wenn man das befallene Blech raustrennt, gründlich Sandstrahlt, oder mit Säure behandelt. Eine möglichkeit 
                neben einölen/fetten ist das streichen mit Halböl. Das ist eine Mischung aus Leinölfirnis und Terpentinöl oder 
                anderen Lösungsmitteln, die Rost gut durchdringt und anschließend durch oxidation aushärtet (Leinölfirniss bleibt 
                trotzdem flexibel und reisst nicht) Das Oxidieren entzieht dem Rost den noch enthaltenen Sauerstoff, und bremst 
                damit das Weiterrosten. Das ist übrigens auch teil der Problematik - Rost arbeitet erstmal weiter, auch wenn man 
                ihn von frischem Sauerstoff aus der Atmosphäre trennt. Ob das Rosten davon vollständig gestoppt wird, hängt davon 
                ab wie stark die stelle verrostet ist, und wie gut das Öl den Rost durchdrungen hat.. ',
                    'frage_id' => 4,
                    'user_id' => 4
                ),
                array(
                    'text' => 'Ich habe an meinem 64er Mustang auf der Innenseite der hinteren linken Seitenwand 
                (Kofferraum) eine fiese Roststelle, die im Grunde -damit es später sauber aussieht- das Abschleifen 
                der gesamten Wand nach sich zieht. Da ich für diese Arbeit letztes Jahr bzw. bis jetzt noch keine 
                Zeit hatte, habe ich diese Stelle auf Anraten eines Oldie-Restaurateurs großzügig und mehrmals mit
                 Mike Sanders Fett behandelt. Dies soll, wie du schon richtig erwähntest, der Stelle den Sauerstoff 
                 abschnüren und so zumindest das weiterrosten verhindern. Über die Optik brauchen wir uns nicht streiten 
                 (so oft guckt man ja auch nicht in den Kofferraum ;) ), aber zumindest ist die Roststelle damit voererst 
                 entschärft worden.',
                    'frage_id' => 4,
                    'user_id' => 2
                ),
                array(
                    'text' => 'Zwischen mehreren und etlichen tausend Euro - präziser kann man es nicht einschätzen. Allein die Vorarbeiten sind nicht annähernd überschaubar, wenn stellenweise schon der Lack abbblättert. Und wenns originalgetreu mit Lacken auf Lösemittelbasis gemacht werden soll, muss erstmal jemand gefunden werden, der das überhaupt macht - inzwischen haben alle gezwungenermaßen auf Wasserbasis umgestellt.Zwischen mehreren und etlichen tausend Euro - präziser kann man es nicht einschätzen. Allein die Vorarbeiten sind nicht annähernd überschaubar, wenn stellenweise schon der Lack abbblättert. Und wenns originalgetreu mit Lacken auf Lösemittelbasis gemacht werden soll, muss erstmal jemand gefunden werden, der das überhaupt macht - inzwischen haben alle gezwungenermaßen auf Wasserbasis umgestellt.',
                    'frage_id' => 3,
                    'user_id' => 1
                ),
                array(
                    'text' => 'Es kommt darauf an, wie gut man es haben will. Man sollte die Karosserie komplett abbauen, Fenster/Lampen mit Gummis und ähnlichem entfernen, bis wirklich nur noch die Karosserie übrig ist. Wenn man den alten Lack entfernt hat (Sandstrahlen?) sieht man erst, wie der Rostzustand wirklich ist, und kann gegebenenfalls das Material ausbessern (Bleche einschweißen). Diese Vorbereitungsarbeiten übernehmen Oldtimer-Schrauber in der Regel selbst und bringen die Karosserie erst dann zum Lackierer, der dann feinste Unebenheiten ausgleicht und anschließend Lackiert. Ich habe den Preis dafür schonmal von einem Auto-Schrauber gehört, bin mir aber nicht mehr sicher, ich glaube er lag im Bereich von 3-5 tausend Euro.',
                    'frage_id' => 3,
                    'user_id' => 2
                ),
                array(
                    'text' => 'Es gibt aber auch die Möglichkeit, die Karosserie drauf zu lassen, was natürlich in einem nicht perfekten Ergebnis mündet. Auf jeden Fall soll es auch viele schwarze Schafe geben, die vereinbarte Leistungen nicht einhalten, was man privat nachher nur schwer überprüfen kann. Man muss dem Lackierer vertrauen können, ähnlich wie einem Arzt ;-)',
                    'frage_id' => 3,
                    'user_id' => 1
                ),
                array(
                    'text' => 'Ganz ehrlich, Schnapsidee! Lass es sein... Ich bin selber oldtimerbastler und erstens ist das schweine teuer sofern du nicht so viel wie möglich selber machst, zweitens ist es nur mit neu lackieren nicht getan! Das auto sollte zerlegt werden, Karosserie runter, zum Sandstrahlen, dann eventuell schweisen,ausdellen etc und erst dann zum lackieren.... Und dann natürlich wieder zusammenbauen.... 
Daher mein rat, lass es bleiben und such nach nem neuen Geschenk ;-)
Lg grepolis',
                    'frage_id' => 3,
                    'user_id' => 2
                ),
                array(
                    'text' => 'das ist offensichtlich vom TÜV Beamten abhängig',
                    'frage_id' => 5,
                    'user_id' => 1
                ),
                array(
                    'text' => 'Die Antwort fällt mit dem Verweis auf dem im Verkehrsblatt veröffentlichten Kriterienkatalog, der auf Basis der Ermächtigung des § 23 StVZO erlassen wurde in der Theorie leicht. Leider ist der Katalog urheberrechtlich geschützt, weshalb ich ihn hier nicht veröffentlichen mag. Bei Fragen, mich bitte direkt mit ansprechen.
MfG',
                    'frage_id' => 5,
                    'user_id' => 3
                ),
                array(
                    'text' => 'Der Deuvet hat die Regeln sehr gut kommentiert und ins Netz gestellt. http://www.v8-drivers.de/Downloads/Sonderheft_Oldtimer-Zulassung_April_2011.pdf
Alles was dort steht kann unterschiedlich interpretiert werden. So ist zum Beispiel das Weglassen wesentlicher Fahrzeugteile nicht zulässig. Wenn in den 30ger Jahren ein Ford A oder B zum Hot Rod wurde, dann geschah das u.a. durch entfernen der Motorhaube und der Kotflügel. Aus meiner Sicht ist der innerhalb der ersten 10 Jahre erfolgte oder möglich gewesene Umbau historisch und H fähig. Auch wenn er deutlich vom originalen Neuwagen abwich.
Es ist nur die Frage ob jeder TÜV Prüfer das auch so sieht oder die erforderlichen Informationen hat um das genauso sehen zu können. ',
                    'frage_id' => 5,
                    'user_id' => 5
                ),
                array(
                    'text' => 'Die Frage ist hier immer, ob die Modifikationen nicht vielleicht erst NACH Erteilung des H-Kennzeichens vorgenommen wurden.
Bei den folgenden HUs einfach auf einen etwas gutmütigen Sachverständigen hoffen und die Sache geht schon.
Wie überall, so gibt es auch hier ein Netzwerk und eine Szene, wo man weiß, wen man fragen muss.
Sie haben gut beobachtet, dass der von Ihnen beschriebene Wagen per Definition höchstwahrscheinlich nicht "H-fähig" ist.
Gönnen wir es dem Besitzer und halten inne.
Hier nachzubohren, ist in meinen Augen kontraproduktiv, da der "Schuss nach hinten losgehen" wird und letztendlich bei zu viel Aufmerksamkeit durch Behörden und Organisationen irgendwelche weiteren Restriktionen oder Einschränkungen stattfinden werden.
Man kann hier sicher sagen, dass die Besitzer solcher Bastelbuden schuld daran wären. Man kann aber auch dafür plädieren, dass einfach bei solchen kaum bewegten Schätzchen, von denen keine Gefahr ausgeht, mit etwas Kulanz auf den Sachverhalt geblickt werden kann.',
                    'frage_id' => 5,
                    'user_id' => 6
                )
            )
        );


        //User_hat_Thema
        DB::table('user_hat_thema')->insert(
            array(
                array(
                    'thema_id' => '1',
                    'user_id' => '1'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '2'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '3'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '4'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '5'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '6'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '7'
                ),
                array(
                    'thema_id' => '1',
                    'user_id' => '8'
                )
            )
        );

        //Brauchen wir nicht, oder?
        //User_wählt_Modell
        DB::table('user_waehlt_modell')->insert(
            array(
                'fzg_modell_id' => '1',
                'user_id' => '1'
            )
        );

        //Vote
        DB::table('vote')->insert(
            array(
                array(
                    'value' => '1',
                    'antwort_id' => '1',
                    'user_id' => '4'
                ),
                array(
                    'value' => '-1',
                    'antwort_id' => '2',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '3',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '4',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '5',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '5',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '5',
                    'user_id' => '1'
                ),
                array(
                    'value' => '-1',
                    'antwort_id' => '6',
                    'user_id' => '1'
                ),
                array(
                    'value' => '1',
                    'antwort_id' => '6',
                    'user_id' => '1'
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
