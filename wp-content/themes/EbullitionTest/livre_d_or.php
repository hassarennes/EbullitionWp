<?php
/*
* Template Name: Livre d'or
*/
?>

<?php get_header();?>
<?php include "slide.php";?>

<div class="pagelivreDOR container-fluid" id="livreDOR">
  <div class="titre"><h2>LIVRE D'OR</h2></div>
    <div class="contenu">

      <div class="row">

        <div class=" contnP col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8 ">
        <p class="gris col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <?php echo do_shortcode('[do_widget id="text-3"]');?>
          </p>
          <button type="button" class="iconSigner btn btn-default col-lg-4 col-md-4 col-sm-4 col-xs-12" onclick="document.location='#zonePostuler'" >COMMENTER</button>
        </div>
        

        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8">
          <?php echo do_shortcode('[gwolle_gb]');?>
        </div>

        <ul class="pagination col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </ul>

    </div>
      </div>
       <div class="row zonePostuler" id="zonePostuler">
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-2 col-xs-8">
        <h4>SIGNEZ NOTRE LIVRE D'OR ET PARTAGEZ VOTRE AVIS.</h4>
        <form class="form no-gutters" role="form">
          <div class="row">
            <div class="formulaire-comnt col-lg-12 ">
              <div class="form-group col-lg-6 col-md-6 col-sm-12  col-xs-12">
                <input type="name" class="form-control case" id="name" placeholder=" Nom/Raison sociale*">
                <input type="name" class="form-control case" id="ville" placeholder=" Ville">
                <input type="email" class="form-control case" id="email" placeholder=" Email*">
                <label class="checkbox-inline"><input type="checkbox" value=""> Je veux recevoir la newsletter sur mon email.</label>
                <!--<label class="checkbox-inline"><input type="checkbox" value=""> particulier</label>-->
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12  col-xs-12">
                <textarea  class="form-control txtAra" placeholder=" votre message*" rows="6"></textarea>
              </div>
              <button type="submit" class="btn btn-default validerCmnt col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">VALIDER</button>
            </div>
            </div> 
           </form>
        </div>
    </div>
  </div>
</div>
<?php get_footer();?>