<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
$this->title = 'Frenzel GmbH - Business Intelligence, Analysis and Planning';
?>

<section class="featured">
    <div class="container"> 
        <h1 class="text-center v-center">We love numbers!</h1>
        <div class="row mar-bot20">
              <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-10 col-sm-offset-2 text-center"><h3>Robust</h3>
                    <p>
                      Any solution we are building has the need of beeing available and none destroyable by any interaction - by users or systems.
                      To ensure this, we are using and developing on stable and well known tools like QlikView, Prevero Coroprate Planning or for
                      web applications on the amazing MVC-Framework Yii.
                    </p>
                    <i class="fa fa-cog fa-5x"></i>
                    <h3>Robustheit</h3>
                    <p>
                      Alle Lösungen die wir erstellen, müssen unser Grundbedürfnis für Verfügbarkeit und Robustheit erfüllen. Unabhängig der möglichen
                      Fehlerquellen - Benutzer oder Systeme. Um dies zu Gewährleisten benutzen wir ausschließlich ausgereifte Werkzeuge wie QlikView, 
                      Prevero Corporate Planner und im Web das erstaunliche MVC-Framework Yii.
                    </p>
                  </div>
                </div>
              </div>
                <div class="col-sm-4 text-center">
                  <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                    <h3>Simple</h3>
                    <p>
                      Keep it small and simple! We had to listen so often to those words from our dad and now - after understanding why he always came up with it -
                      it became one of our 5 company principles. Knowing your audience and supplying them with the solutions they need is the essential target we
                      focus on! And the user decides if you are having success or not!
                    </p>
                    <i class="fa fa-user fa-5x"></i>
                      <h3>Einfachheit</h3>
                      <p>
                        Halte es klein und einfach! Wie oft haben wir diese Worte von unserem Vater hören dürfen, nachdem wir es selbst verstanden haben ist es zu einem
                        unserer 5 Firmengrundsätze geworden. Seine Anwender zu kennen und diese mit der passenden Lösung zu versorgen ist das wichtigste Ziel unseres 
                        schaffens! Am Ende entscheidet der Anwender ob wir erfolg haben oder nicht!
                      </p>
                    </div>
                  </div>
              </div>
                <div class="col-sm-4 text-center">
                  <div class="row">
                    <div class="col-sm-10 text-center">
                      <h3>Clean</h3>
                      <p>
                        Clean is the code we are writing, the interface for the user and of course our kitchen;) Always keeping in mind, that a clean design is portable, scalable
                        and easy to understand and extended by other developers. As we are contributing a lot to opensource solutions, we know the advantages of documented code.
                      </p>
                      <i class="fa fa-mobile fa-5x"></i>
                      <h3>Sauberkeit</h3>
                      <p>
                        Sauber ist der Quelltext den wir schreiben, die visuelle Schnittstelle für den Benutzer und natürlich unsere Küche;) Wir behalten dabei immer im Hinterkopf, dass
                        unsere Lösungen einen klaren Entwurf haben, skalierbar sind und von anderen Entwicklern gewartet und erweitert werden können. Da wir viel in OpenSource Projekten mitarbeiten, 
                        kennen wir die Vorteile eines dokumentierten Quelltextes.
                      </p>
                    </div>
                  </div>
              </div>
        </div>
    </div>
</section>

<section id="section-services" class="section pad-bot30 bg-white">
    <div class="container">
        <div class="row mar-bot40">
            <div class="col-lg-12">
                
                <?php
                  echo frenzelgmbh\scms\widgets\PortletSinglePage::widget(array(
                      'id'=>1,
                  ));
                ?>

            </div>
        </div>
    </div>
</section>

<!-- spacer section:testimonial -->
<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
<div class="container">
    <div class="row">               
            <div class="col-lg-12">
                    <div class="align-center">
                                <div class="testimonial pad-top40 pad-bot40 clearfix">
                                    <h5>
                                        Nunc velit risus, dapibus non interdum quis, suscipit nec dolor. Vivamus tempor tempus mauris vitae fermentum. In vitae nulla lacus. Sed sagittis tortor vel arcu sollicitudin nec tincidunt metus suscipit.Nunc velit risus, dapibus non interdum.
                                    </h5>
                                    <br/>
                                    <span class="author">&mdash; Frenzel GmbH <a href="#">www.frenzel.net</a></span>
                                </div>

                        </div>
                    </div>
            </div>
        
    </div>  
</div>  
</section>

<!-- about -->
        <section id="section-about" class="section appear clearfix">
        <div class="container">
            <div class="row mar-bot40">
                <div class="col-md-offset-3 col-md-6">
                    <div class="section-header">
                        <h2 class="section-heading animated" data-animation="bounceInUp">About Us</h2>
                        <p>Work - Live - Balance</p>
                    </div>
                </div>
            </div>       
        </div>
        </section>
