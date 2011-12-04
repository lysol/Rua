<?php
/*
 * Template Name: The Single Page
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Rua
 * @since Rua 3.0
 */

get_header(); ?>

    <!-- Topbar
    ================================================== -->
    <div class="topbar" data-scrollspy="scrollspy" >
      <div class="fill" id="my-fill">
        <div class="container">
          <ul>
            <li><a class="top-nav-link" href="#home">HOME</a></li>
            <li><a class="top-nav-link" href="#about">ABOUT</a></li>
            <li><a class="top-nav-link" href="#pitch">PITCH</a></li>
            <li><a class="top-nav-link" href="#work">WORK</a></li>
            <li><a class="top-nav-link" href="#resume">RESUME</a></li>
            <li><a class="top-nav-link" href="#contact">CONTACT</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
        <section id="home">
        &nbsp;
        </section>
    </div>
    <div id="about-container" class="container-fluid">
        <section id="about">
        <p>
            I'm <span class="red-name">Rua Arnold</span>, a graphic designer
            based in Des Moines, Iowa.
        </p>

        <p>
            <span class="body-bigger">I get so excited about good design</span>
            that my eyes dilate when I see it. I'm also passionate about
            photography, video production &amp; copywriting.
        </p>

        <p>
            <span class="body-bigger">I have the sort of brain that won't
            quit.</span> I tend to look at the many things in life through a
            viewfinder. I've always felt that inspiration can be found
            anywhere. We just have to look for it!
        </p>

        <p>
            <span class="body-bigger">My primary design experience to
            date</span> has been corporate design, print and web advertising
            and community-centric design; however, I'm always looking to branch
            out into other areas.
        </p>

        <p>
            <span class="body-bigger">I'm the sort of person who needs</span>
            to always be learning a new skill. Apart from graphic design I'm
            teaching myself to play ukelele.
        </p>
        </section>
    </div>
    <div class="container-fluid">
        <section id="pitch">
            <div class="descriptive" id="composition">
                Rua is comprised of:
            </div>
            <div class="descriptive" id="where-worked">
                Where I've worked:
            </div>
            <div class="descriptive" id="where-designs">
                Where my designs have reached:
            </div>
            <div class="descriptive" id="graph">
                What I bring to the table:
            </div>
        </section>
    </div>
    <div id="work-container" class="container-fluid">
        <section id="work">
            <div id="rua-slider">
<?php
    $posts = image_posts();
    foreach ($posts as $id => $post) {
        print "<div id=\"viewer-$id\" class=\"image-set\">";
        $first = true;
        foreach ($post as $image) {
            if ($first) {
                $linkto = $image[0];
                $src = $image[0];
            } else {
                $linkto = $image[1];
                $src = em_resize($image[1], 'auto', 450, 90, 0);
            }
            print "<a href=\"$linkto\" rel=\"lightbox-$image[2]\"><img src=\"$src\" id=\"image-$image[2]\" alt=\"$image[3]\" /></a>";
            $first = false;
        }
        print "</div>";
    }
?>
            </div>
        </section>
        <div style="clear: both;">&nbsp;</div>
    </div>
    <div class="container-fluid">
        <section id="resume">
            <div class="resume-part">
                <h1>Qualifications</h1>
                <p id="qualifications">
                    Possesses a meticulous eye for detail, works well under deadlines,
                    and enjoys working alone or in groups.
                </p>
            </div>

            <div class="resume-part">
                <h1>Experience</h1>
                <h2>Lyons Toyota, Mason City IA  Feb 2011 — Sept 2011</h2>
                Digital Marketing Assistant
                <ul>
                    <li>Created graphics for use on the web and print
                        advertising.</li>
                    <li>Wrote copy for advertising. Shot photography for use
                        on the web.</li>
                    <li>Assisted in maintenance of website and web-based
                        marketing.</li>
                </ul>
            </div>

            <div class="resume-part">
                <h2>TeamQuest Corporation, Clear Lake IA  Dec 2006 — Aug 2010</h2>
                Marketing Graphic Designer
                <ul>
                    <li>Created graphics for company’s marketing materials
                        and software products.</li>
                    <li>Photographed events and used studio equipment.</li>
                    <li>Produced video and multimedia projects for online
                        content.</li>
                </ul>
            </div>

            <div class="resume-part">
                <h2>Dimensional Graphics, Mason City IA  May 2006 — Dec 2006</h2>
                Artist
                <ul>
                    <li>Created and processed artwork for offset and screen
                        printing.</li>
                    <li>Stripped up graphics for screen printing.</li>
                    <li>Printed documents on IKON printer.</li>
                </ul>
            </div>

            <div class="resume-part">
                <h2>Globe Gazette, Mason City IA  Aug 2003 — Dec 2005</h2>
                Online Editor
                <ul>
                    <li>Produced video and multimedia projects for online
                        content.</li>
                    <li>Acted as a liaison between news and online
                        departments.</li>
                    <li>Led online news projects.</li>
                </ul>
                Digital Imaging Specialist
                <ul>
                    <li>Produced video and multimedia projects for online
                        content.</li>
                    <li>Scanned and color-corrected images for print
                        edition.</li>
                    <li>Created graphics for print edition.</li>
                </ul>
            </div>

            <div class="resume-part">
                <h1>Education</h1>

                <h2>Iowa State University, Ames IA</h2>
                <div class="resume-sub">Bachelor of Arts in Journalism and
                Mass Communication, emphasis in Visual Communication</div>

                <h2>North Iowa Area Community College, Mason City IA</h2>
                <div class="resume-sub">Associate of Arts in Journalism</div>
            </div>

            <div class="resume-part">
                <h1>Skills</h1>
                <h2>Software</h2>
                <div class="resume-sub">
                    Adobe Bridge CS5, Adobe Illustrator CS5, Adobe InDesign
                    CS5, Adobe Photoshop CS5, Adobe Premiere Pro CS5, Adobe
                    Soundbooth CS5, Final Cut Pro, Microsoft Office, Microsoft
                    PowerPoint, QuarkXPress
                </div>

                <h2>Equipment</h2>
                <div class="resume-sub">
                    HDR-FX1 HDV Handycam, Studio equipment, Nikon SLR digital
                    cameras, IPIX, Egg Technologies, Epson Perfection 4490
                    photo flatbed scanner, PC, Mac
                </div>
            </div>

            <div class="resume-part">
                <h1>References</h1>
                <div class="resume-sub">
                    Available upon request.
                </div>
            </div>
        </section>
    </div>
    <div id="contact-container" class="container-fluid">
        <section id="contact">
            <h1>Contact Me</h1>
            <?php echo do_shortcode( '[contact-form-7 id="50" title="Contact form 1"]' ); ?>
        </section>
    </div>
    <section id="last">
    </section>
<?php get_footer(); ?>