@extends('front/layouts.default')
@section('content')
<div class="site-content">



 <section class="faq-sect">

   <div class="container">

      <h3>{{$getCategory}} FAQ</h3>

      <div id="faq" role="tablist" aria-multiselectable="true">



      <?php foreach($getFAQ as $key => $faq) { 
      $expand = ($key == 0) ? 'true' : 'false';
      $expand1 = ($key == 0) ? 'show' : '';
      ?>

      <div class="card">

      <div class="card-header" role="tab" id="questionOne">

      <h5 class="card-title">

      <a data-toggle="collapse" data-parent="#faq" href="#answer_<?php echo $faq->faqid; ?>" aria-expanded="<?php echo $expand; ?>" aria-controls="answerOne">

      <?php echo $faq->question; ?>

      </a>

      </h5>

      </div>

      <div id="answer_<?php echo $faq->faqid; ?>" class="collapse <?php echo $expand1; ?>" role="tabcard" aria-labelledby="questionOne">

      <div class="card-body">

       <?php echo $faq->answer; ?>
      </div>

      </div>

      </div>

       <?php } ?>



      </div>

  </div>

 </section>



</div><!-- site-content -->
@stop

