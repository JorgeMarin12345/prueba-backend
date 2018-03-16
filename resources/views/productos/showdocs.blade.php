@if (count($docs)>0)
  <div class="row">
      @foreach($docs as $doc)
          @if ($doc->imagen)
              <div class="col-md-4">
                  <a href="{{route('documento',$doc->ruta)}}" target="blank">
                  <div class="thumbnail">
                      <img src="{{route('documento',$doc->ruta)}}" style="max-height:150px;">
                      <div class="caption">
                        <p>&nbsp;</p>
                      </div>
                  </div>
                  </a>
              </div>
          @else
              <a href="{{route('documento',$doc->ruta)}}" target="blank">Documento pdf</a>
          @endif
      @endforeach
  </div>
@endif
