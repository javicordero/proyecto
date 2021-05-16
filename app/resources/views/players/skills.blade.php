 <!-- start skills -->
 <div class="row">
     @foreach ($data['attribute_types'] as $attribute_type)
         <div class="col-md-3 col-xs-3">
             <h4>{{ $attribute_type->name }}</h4>
             @foreach ($attribute_type->attributes as $attribute)
                 <ul class="list-unstyled user_data">
                     <li>
                         <p>{{ $attribute->name }}</p>
                         <div class="progress progress_sm">
                             <div class="progress-bar" role="progressbar"
                                 data-transitiongoal="{{ $attribute->getPlayerCurrentValue($data['player']->id) * 5 }}"
                                 data-attributeId="{{ $attribute->id }}" data-playerId="{{ $data['player']->id }}"
                                 data-csrf="{{ csrf_token() }}">
                             </div>
                         </div>
                     </li>
                 </ul>
             @endforeach
         </div>
     @endforeach
 </div>
 <!-- end of skills -->

 <div class="row">
     <!-- line graph -->
     <div class="col-md-10 col-sm-10 col-xs-12">
         <div class="x_panel" id="panel-line-chart">
             <div class="x_title">
                 <h2 id="attributeName"><small id=""></small></h2>
                 <div class="clearfix"></div>
             </div>
             <div class="x_content2">
                 <div id="graph_line" style="width:100%; height:300px;"></div>
             </div>
         </div>
     </div>
     <!-- /line graph -->
 </div>
