
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POKEDEX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="{{asset('estilos.css')}}">
<link rel="stylesheet" href="{{asset('assets/js/jquery-ui/jquery-ui.css')}}">
</head>

<body>

    <div class="container mt-2">
        <div class="text-center">
          <a href="{{route('home')}}"><img src="{{asset('assets/img/Pokemon-Logo.jpg')}}" height="200px" width="200px" alt=""></a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-lg-offset-3">
                <div class="card bg-light p-4">
                    <div class="row p-3">
                      <div class="col-lg-6 offset-3">
                           <input type="text" class="form-control" id="input-pokemon" placeholder="Ingrese el nombre del pokemon">
                           <div class="resultados d-none">
                              <ul class="list-group" id="listado">
                               
                               
                              </ul>
                           </div>
                      </div>
                   </div>
                    <div class="row">
                        @foreach($data->results as $pokemon)
                          @php 
                            $response = $client->request('GET','pokemon/'.$pokemon->name);
                            $data = json_decode($response->getBody());
                          @endphp 
                            <div class="col-lg-3">
                                <div class="card m-2">
                                    <div class="card-header bg-danger text-center">
                                    <img src="{{$data->sprites->front_default}}" alt="Pokemon">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                        <h3>{{$data->species->name}}</h3> 
                                        </div>
                                        <ul class="list-inline">
                                            <li>
                                            <b>HP: {{$data->stats[0]->base_stat}}</b>
        
                                            </li>
                                            <li>
                                                <b>Ataque: {{$data->stats[1]->base_stat}}</b>
        
                                            </li>
                                            <li>
                                                <b>Defensa: {{$data->stats[2]->base_stat}}</b>
                                            </li>
                                        </ul>
                                        <div class="text-center">
                                          <button class="btn btn-primary info" value="{{$data->id}}">Mas informacion</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                  
                </div>
            </div>
              
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog  modal-lg" role="document">
          <div class="modal-content ">
            <div class="modal-header" id="modal-header">
            
              <h4 class="modal-title" id="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
            
      
            <div class="modal-body" id="modal-body">
                <div class="row text-center">
                    <div class="col-lg-6 offset-3">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img id="img-pokemon1" height="200px" width="200px" src="" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img id="img-pokemon2" height="200px" width="200px" src="" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img id="img-pokemon3" height="200px" width="200px" src="" alt="">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only ">Next</span>
                            </a>
                        </div>
                       
                    </div>    
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-2">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">HP</th>
                                <th scope="col">Ataque</th>
                                <th scope="col">Defensa</th>
                                <th scope="col">Velocidad</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="hp"></td>
                                <td id="ataque"></td>
                                <td id="defensa"></td>
                                <td id="velocidad"></td>
                              </tr>
                            </tbody>
                          </table>
                          
                          <table class="table table-bordered">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Ataque esp</th>
                                <th scope="col">Defensa esp</th>
                                <th scope="col">Altura</th>
                                <th scope="col">peso</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td id="ataque-esp"></td>
                                <td id="defensa-esp"></td>
                                <td id="altura"></td>
                                <td id="peso"></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
              
            </div>
      
           
          </div>
        </div>
      </div>
    </div>
    
    
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="{{asset('assets/js/jquery-ui/jquery-ui.js')}}"></script>
<script>
   $(document).ready(function(){
      $('.info').click(function(){

          var id = $(this).val();
          $.ajax({
             method: 'POST',
             data: {
                 pokemon: id,
                 _token: "{{csrf_token()}}"
             },
             url: '/pokemon',
             success: function(data){
                $('#modal').modal('show');
                console.log(data['nombre']);
                $('#modal-title').html(data['nombre']);
                $('#img-pokemon1').attr('src',data['imagenes']['front_default']);
                $('#img-pokemon2').attr('src',data['imagenes']['back_default']);
                $('#img-pokemon3').attr('src',data['imagenes']['front_shiny']);
                $('#hp').html(data['stats'][0]['base_stat']);
                $('#ataque').html(data['stats'][1]['base_stat']);
                $('#defensa').html(data['stats'][2]['base_stat']);
                $('#ataque-esp').html(data['stats'][3]['base_stat']);
                $('#defensa-esp').html(data['stats'][4]['base_stat']);
                $('#velocidad').html(data['stats'][5]['base_stat']);
                $('#altura').html(data['altura']/10+ "m");
                $('#peso').html(data['peso']/10+ "KG");
             }
          });
      });
      function listadoPokemones(request,response){
        
      }
      $('#input-pokemon').autocomplete({
         minLength: 2,
         source: function(request,response){
          $.ajax({
              url: "{{route('allPokemon')}}",
              dataType: "json",
              data: {
                query: request.term,
              },
              success: function(data){
                var listado = [];
                //traigo todos los pokemones y por cada uno le agrego el nombre a un arreglo "listado"
                data.forEach(pokemon => {
                   listado.push(pokemon["name"]);
                });
                //filtro el arreglo "listado" que incluya la busqueda en el input
               var filtrados = listado.filter(pokemones => pokemones.includes(request.term));
               if(filtrados.length == 0){
                 resp = ["No hay resultados para tu busqueda"];
                 response(resp);
               }else{
                 response(filtrados);
               }
              // console.log(filtrados);
              //agrego los filtrados al listado del autocomplete
              
              
              } 
            });
         },
         select: function(event,ui){
           console.log("Haz seleccionado a :"+ui.item.value);
           location = "/search/pokemon/info/"+ui.item.value;
         }
      });
      $('#input-pokemon').on('keypress',function(){
          var busqueda = $(this).val();
          console.log("Estas buscando: "+busqueda);
      });
     
   });
</script>