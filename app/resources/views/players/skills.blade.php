 <!-- start skills -->
 <div class="col-md-12 col-sm-12 col-xs-12">
     <div class="x_panel">
         <div class="x_title">
             <h2>Atributos<small id=""></small></h2>
             <div class="clearfix"></div>
         </div>

         @foreach ($data['attribute_types'] as $attribute_type)
             <div class="col-md-4 col-xs-4">
                 <h4 class="attribute-type">{{ $attribute_type->name }}</h4>
                 @foreach ($attribute_type->attributes as $attribute)
                     <ul class="list-unstyled user_data">
                         <li>
                             <p>{{ $attribute->name }}</p>
                             <div class="progress progress_sm">
                                 <div class="progress-bar" role="progressbar" id="progress-bar"
                                     data-transitiongoal="{{ $attribute->getPlayerCurrentValue($data['player']->id) * 5 }}"
                                     data-attributeId="{{ $attribute->id }}"
                                     data-playerId="{{ $data['player']->id }}" data-csrf="{{ csrf_token() }}">
                                 </div>
                             </div>
                         </li>
                     </ul>
                 @endforeach
             </div>

         @endforeach
     </div>
 </div>


