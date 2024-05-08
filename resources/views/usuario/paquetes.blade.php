<x-headusuario></x-headusuario>

{{-- <main class="page-content">
    <div class="card">
        <div class="content">
            <h1 class="title">Tour Histórico y Cultural:</h1>
            <h3 class="copy">Explora la rica historia y la vibrante cultura de Santiago de los Caballeros.</h3>
            <button class="btn" onclick="showMoreInfo(this)">Ver Más</button>
        <div class="more-info">
          <ul>
            <li>Visita al Monumento a los Héroes de la Restauración para aprender sobre la historia de la República Dominicana.</li>
            <li>Recorrido por el Centro Histórico de Santiago, incluyendo la Catedral de Santiago Apóstol y el Museo Folklórico Don Tomás Morel.</li>
            <li>Degustación de la gastronomía local en un restaurante tradicional.</li>
            <li>Paseo por el Parque Duarte y el Parque Monumento Santiago.</li>
            <li>Visita a La Aurora Cigar Factory para conocer sobre la producción de los famosos cigarros dominicanos.</li>
          </ul>
          <button class="btn-reservar">Reservar</button>
</div>

        </div>
    </div>

    <div class="card">
    <div class="content">
        <h1 class="title">Experiencia de Ecoturismo</h1>
        <h3 class="copy">Descubre la naturaleza exuberante de Santiago de los Caballeros con nuestras increíbles experiencias de ecoturismo.</h3>
        <button class="btn" onclick="showMoreInfo(this)">Ver Más</button>
        <div class="more-info">
            <ul>
                <li>Excursión al Parque Nacional Armando Bermúdez para disfrutar de senderismo y observación de la flora y fauna local.</li>
                <li>Visita a la cascada de Aguas Blancas para refrescarte en sus aguas cristalinas y realizar actividades de aventura como rappel.</li>
                <li>Recorrido por la Reserva Científica Ébano Verde para admirar la diversidad de aves y plantas endémicas.</li>
                <li>Almuerzo campestre con productos locales en medio de la naturaleza.</li>
            </ul>
            <button class="btn-reservar">Reservar</button>
        </div>
    </div>
</div>
<div class="card">
    <div class="content">
        <h1 class="title">Turismo de Aventura</h1>
        <h3 class="copy">¡Experimenta la emoción y la aventura en Santiago de los Caballeros con nuestro paquete de turismo de aventura!</h3>
        <button class="btn" onclick="showMoreInfo(this)">Ver Más</button>
        <div class="more-info">
          <ul>
            <li>Rafting en el río Yaque del Norte, considerado uno de los mejores lugares para este deporte en el Caribe.</li>
            <li>Ruta en bicicleta por los campos y montañas cercanas a la ciudad.</li>
            <li>Excursión a la Laguna El Rincón para practicar kayak y paddleboarding.</li>
            <li>Visita a la comunidad de Los Aposentos para experimentar el turismo rural y participar en actividades agropecuarias.</li>
          </ul>
              <button class="btn-reservar">Reservar</button>
        </div>

    </div>
</div>
<div class="card">
    <div class="content">
        <h1 class="title">Gastronomía y Vida Nocturna</h1>
        <h3 class="copy">¡Disfruta de la deliciosa comida y la vibrante vida nocturna de Santiago de los Caballeros con nuestro paquete turístico especial!</h3>
        <button class="btn" onclick="showMoreInfo(this)">Ver Más</button>
        <div class="more-info">
         <ul>
           <li>Tour gastronómico por los mejores restaurantes de la ciudad, con degustación de platos típicos como el mofongo, la bandera dominicana y los dulces tradicionales.</li>
           <li>Visita a bares y discotecas emblemáticas de Santiago para disfrutar de la música y el baile dominicano, como el merengue y la bachata.</li>
          <li>Clases de cocina dominicana para aprender a preparar algunos platos típicos.</li>
         </ul>
             <button class="btn-reservar">Reservar</button>
        </div>

    </div>
</div>
<div class="card">
    <div class="content">
        <h1 class="title">Turismo de Tradición y Folklore</h1>
        <h3 class="copy">¡Sumérgete en la vibrante cultura dominicana con bailes folklóricos, música en vivo y talleres de merengue y bachata en Los Pepines!</h3>
        <button class="btn" onclick="showMoreInfo(this)">Ver Más</button>
        <div class="more-info">
            <ul>
            <li>Visita a la comunidad de Los Pepines para presenciar bailes folklóricos dominicanos y conocer sobre la cultura y tradiciones locales.</li>
            <li>Participación en una fiesta típica dominicana con música en vivo, comida tradicional y baile.</li>
            <li>Taller de baile de merengue y bachata para aprender los pasos básicos de estos ritmos caribeños.</li>
            <li>Visita a una fábrica de instrumentos musicales para ver cómo se fabrican los típicos tamboras y güiras.</li>
            </ul>
            <button class="btn-reservar">Reservar</button>
        </div>
    </div>
</div>

<div class="card">
    <div class="content">
        <h1 class="title">Tour de Café y Cacao</h1>
        <h3 class="copy">¡Sumérgete en el fascinante mundo del café y el cacao con nuestro tour especializado!</h3>
        <button class="btn" onclick="showMoreInfo(this)">Ver Más</button>
        <div class="more-info">
            <ul>
                <li>Visita a una plantación de café y cacao para aprender sobre el proceso de cultivo y producción.</li>
                <li>Participación en una cata de café y chocolate, degustando diferentes variedades locales.</li>
                <li>Recorrido por una fábrica de chocolate artesanal para ver cómo se elaboran estos deliciosos productos.</li>
                <li>Almuerzo gourmet con platos inspirados en el café y el cacao.</li>
            </ul>
            <button class="btn-reservar">Reservar</button>
        </div>
    </div>
</div>


</main>


<script>
    function showMoreInfo(button) {
      var moreInfo = button.nextElementSibling; // Obtiene el siguiente elemento después del botón (que es el div .more-info)
      moreInfo.style.display = 'block'; // Muestra el contenido adicional
      button.textContent = 'Hide'; // Cambia el texto del botón
      button.setAttribute('onclick', 'hideMoreInfo(this)'); // Cambia la función onclick del botón
    }

    function hideMoreInfo(button) {
      var moreInfo = button.nextElementSibling; // Obtiene el siguiente elemento después del botón (que es el div .more-info)
      moreInfo.style.display = 'none'; // Oculta el contenido adicional
      button.textContent = 'View More'; // Cambia el texto del botón
      button.setAttribute('onclick', 'showMoreInfo(this)'); // Cambia la función onclick del botón
    }
  </script> --}}

<style>
    .contenido {
        margin-top: 10em;
        margin-bottom: 10em;
    }

    .user-profile img {
        width: 124px;
        height: 124px;
    }

    .card-body img {
        size: auto;
    }
</style>

<main class="container contenido">
     <center> <h1>Paquetes Turísticos</h1> </center>
    <hr>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        
        <?php
        $paquetes = DB::select("SELECT p.idPaquete as id, p.Nombre as nombre, p.Descripcion as descripcion,
         p.Costo as costo, p.Num_personas as numpersonas, p.Edades as edades, p.Idiomas as idiomas, p.Alojamiento as alojamiento, p.Tiempo_estimado as tiempoestimado, 
        p.Disponibilidad as disponibilidad, c.CategoriaPaq as categoria, o.Porcentaje as porciento FROM
          paquetes_turisticos as p INNER JOIN categorias_paquetes as c ON p.fk_IdCategoriaPaq=c.IdCategoriaPaq INNER JOIN ofertas as o ON p.fk_IdOferta=o.IdOferta");
        ?>
        @foreach($paquetes as $paquete)
            {{-- <li>{{ $paquete->nombre }}</li> --}}
       

        
        <div class="col">
            <div class="card h-100">
                <div class="card-body"> 

                  

    {{-- Aqui va el id de cada paquete, oculto --}}
             <p class="id" hidden>{{$paquete->id}}</p>
                    <img src="{{asset('img/carnaval.jpg')}}" alt="" class="card-img-top">

                    
                    <h2 class="card-title">{{$paquete->nombre}} </h2>
                    <p class="card-text">{{$paquete->categoria}}</p>
                  
                    <button class="btn btn-primary" onclick="toggleMoreInfo(this)">Ver Más</button>
                    <div class="more-info d-none">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$paquete->descripcion}}</li>
                            <li class="list-group-item">{{$paquete->numpersonas}}</li>
                            <li class="list-group-item">{{$paquete->edades}}</li>
                            <li class="list-group-item">{{$paquete->idiomas}}</li>
                            <li class="list-group-item">{{$paquete->alojamiento}}</li>
                            <li class="list-group-item">{{$paquete->tiempoestimado}}</li>
                            <li class="list-group-item">{{$paquete->disponibilidad}}</li>
                            <li class="list-group-item">{{$paquete->costo}}</li>
                        </ul>
                        <button class="btn btn-primary mt-3"> <a href="{{route('formulario_reservas')}}" style="text-decoration: none; color: white;"> Reservar</a></button>
                    </div>
                </div>
            </div>
        </div> 

        @endforeach
    <!-- Aquí irían las otras tarjetas de los paquetes turísticos, siguiendo el mismo patrón -->
     </div>
 

 

     
</main>

<script>
    function toggleMoreInfo(button) {
        const moreInfo = button.nextElementSibling;
        moreInfo.classList.toggle('d-none');
        button.textContent = moreInfo.classList.contains('d-none') ? 'Ver Más' : 'Hide';
    }
</script>

<x-footerusuario></x-footerusuario>
