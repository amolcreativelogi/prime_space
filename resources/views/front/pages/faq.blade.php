@extends('front/layouts.default')
@section('content')

<div class="site-content">
  <section class="faq-sect">
      <div class="container">
        
        <h3>FAQ</h3>

    <?php if(empty($arrFaqWithCat)){ ?>
            <div>No contents</div>
    <?php }else{ ?>
    <ul class="nav nav-tabs">
      <?php $index=0; foreach($faqCategories as $category_id => $faqCategory){?>
        <li <?php if($index == 0){ echo 'class="active"';} else {echo 'class=""';} ?>>
          <a data-toggle="tab" href="#faq_<?=$category_id?>"><?=$faqCategory;?></a>
        </li>
     <?php $index++;} ?>
    </ul>

      <div class="tab-content">
        <?php $i=0;
        foreach($arrFaqWithCat as $cat_id => $faqWithCat){ ?>
          <div id="faq_<?=$cat_id?>" class="tab-pane fade in <?php echo ($i==0)?'active':'';?>">
               @foreach($faqWithCat as $faq)
      
                  <div class="card">
                    <div class="card-header" role="tab" id="question<?=$faq['faq_id'];?>">
                    <h5 class="card-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#answer<?=$faq['faq_id'];?>" aria-expanded="false" aria-controls="answer<?=$faq['faq_id'];?>">
                      <?=$faq['question'];?>
                    
                    </a>
                    </h5>
                    </div>
                    <div id="answer<?=$faq['faq_id'];?>" class="collapse" role="tabcard" aria-labelledby="question<?=$faq['faq_id'];?>">
                    <div class="card-body">
                      <p> <?=$faq['answer'];?></p>
                    </div>
                    </div>
                </div>
                @endforeach
            
          </div>
       <?php $i++;} ?>
    </div>
     <?php } ?>
  </section>
</div><!-- site-content -->
@stop

