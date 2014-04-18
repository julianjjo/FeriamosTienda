<?php $title = 'Registro Usuario' ?>

<?php ob_start() ?>
<script type="text/javascript">    
    var limite = 2000;
    $( document ).ready(function() {
        $( "#departamento" ).change(function() {
            var id_departamento = $(this).val();
            var ciudades = "<option value=\"\">Seleccione la ciudad</option>";
            $.get( "/departamento", { id: id_departamento} )
                .done(function( data ) {
                ciudades = ciudades+data;                
                $("#ciudad").html(ciudades);
            });
        });
    });    
</script>
<?php $script = ob_get_clean() ?>

<?php ob_start() ?>
<style type="text/css">
  .scroll{
    height: 400px;
    overflow: auto;
    border-style:solid;
    border-color: #D8D8D8;
    padding: 20px;
    border-radius: 10px;
    background-color: #FFFFFF;
    text-align: justify;
    border-width: 1px;
  }
</style>
<?php $estilo = ob_get_clean() ?> 

<?php ob_start() ?>
    <div class="container">
      <div class="well">
        <p class="text-warning">Lo campos marcados con asterisco * son obligatorios</p>
        <form role="form" action="/registro" method="POST" onsubmit="return validacion_registro()" name="form1">
          <div class="form-group">
            <label for="email" >*Direccion de Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" name="email" required>
          </div>
          <div class="form-group">
            <div id="errorcontra" class="alert alert-danger hidden">
                <p>La contraseña debe tener entre mínimo 8 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales</p>
            </div>
            <label for="contraseña">*Contraseña:</label>
            <input type="password" class="form-control" id="contraseña" placeholder="Contraseña" name="password" required>
          </div>
          <div class="form-group">
            <div id="errorrepetircontra" class="alert alert-danger hidden">
                <p>La contraseñas no son iguales</p>
            </div>         
            <label for="repetircontraseña">*Repetir Contraseña:</label>
            <input type="password" class="form-control" id="repetircontraseña" placeholder="Repitir Contraseña" name="repetirpassword" required>
          </div>
          <div class="form-group">
            <label for="Nombre">*Nombre:</label>
            <input type="input" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
          </div>
          <div class="form-group">
              <label for="apeliidos">*Apellidos:</label>
              <input type="input" class="form-control" id="apeliido" placeholder="Apellidos" name="apellidos" required>
          </div>
          <div class="form-group">
              <div id="errortelefono" class="alert alert-danger hidden">
                  <p>El telefono solo debe tener numeros</p>
              </div>
              <label for="telefono">*Telefono:</label>
              <input type="tel" class="form-control" id="telefono" placeholder="Telefono" name="telefono" required>
          </div>
          <div class="form-group">
              <div class="alert alert-danger hidden" id="departamentoerror">
                  <p>Selecione un departamento</p>
              </div>
              <label>Departamento</label>
              <select class="form-control" id="departamento" name="departamento">
                  <option value="">Seleccione el departamento</option>
                  <?php foreach ($departamentos as $departamento): ?>
                      <option value="<?php echo $departamento['ID_DEPARTAMENTO'] ?>"><?php echo utf8_encode($departamento['NOMBRE']) ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <div class="form-group">
              <div class="alert alert-danger hidden" id="ciudaderror">
                  <p>Selecione una ciudad</p>
              </div>
              <label>Ciudad</label>
              <select class="form-control" id="ciudad" name="ciudad">
                  <option value="">Seleccione la ciudad</option>
              </select>
          </div>
          <div class="form-group">
              <label for="direccion">*Dirección:</label>
              <input type="input" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
          </div>
          <br>
          <h3 class="text-center">TERMINOS Y CONDICIONES</h3>
          <br>
          <div class="scroll">
            <p>INGRESO A LA PAGINA: El presente acuerdo entre Usted y WWW.FERIAMOS.COM establece las condiciones y términos generales aplicables al uso por parte de los usuarios de los servicios que presta WWW.FERIAMOS.COM incluyendo, los servicios prestados a través del portal de Internet, que se encuentra bajo la dirección WWW.WWW.FERIAMOS.COM, Los términos "Usted" y "Usuario" se emplean aquí para referirse a todos las personas físicas y/o jurídicas que por cualquier razón accedan al Sitio. POR FAVOR, LEA ESTA PIGINA ATENTAMENTE. SI NO ACEPTA ESTOS TERMINOS, NO UTILICE ESTE SITIO, además tenga en cuenta lo siguiente:</p>
            <p>Cualquier persona que desee acceder y/o usar el sitio o los servicios podrá hacerlo sujetándose a los Términos y Condiciones, junto con todas las demás políticas y principios que rigen el Sitio y que se incorporan al presente por referencia. En el caso de que un Usuario no cumpla con las leyes aplicables o alguna clausula de este Acuerdo de Usuario, el propio usuario asumirá plena responsabilidad por dichos actos y liberará a WWW.FERIAMOS.COM de todos los derechos, reclamaciones, acciones, procedimientos, a los cuales el Usuario puede haber faltado.</p>
            <p>Dado que esta plataforma no implica una relación de permanencia obligatoria contractual para el usuario (excepto la comisión voluntaria pactada según tarifas del servicio), WWW.WWW.FERIAMOS.COM se reserva el derecho de suspender o cancelar a cualquier usuario que viole estos términos y condiciones, incluyendo, sin limitación, cuando un usuario es denunciado, sospechoso, o es encontrado participe directo o indirecto de conductas o actividades dolosas o criminales relacionada con nuestro servicio, o en cualquier momento con o sin motivo a la absoluta discreción nuestra. WWW.WWW.FERIAMOS.COM no acepta ni asume responsabilidad alguna por la legalidad de las acciones de ninguno de sus Usuarios ni tampoco por la autenticidad o veracidad de la información recibida y publicada por parte de los mismos. WWW.FERIAMOS.COM no tendrá responsabilidad con ningún usuario si suspende o cancela sus servicios por cualquier motivo. El Usuario renuncia expresamente a todos los derechos que pudiese haber contraído con WWW.FERIAMOS.COM y exime a WWW.FERIAMOS.COM de toda responsabilidad por las consecuencias directas o indirectas que la suspensión de los servicios pudiera ocasionarle al Usuario o a terceros. </p>
            <p>WWW.FERIAMOS.COM se reserva el derecho de aceptar o rechazar la inscripción solicitada por alguna persona o empresa. Toda la información proporcionada por el usuario será mantenida en forma confidencial, a menos que este autorice implícita o explícitamente su publicación.</p>
            <p>WWW.FERIAMOS.COM no venderá, ni alquilara, la información de sus Usuarios con terceras personas ajenas a WWW.FERIAMOS.COM. Sin embargo, podrá proporcionar información relacionada a un Usuario si recibe una orden, demanda o requerimiento de hacerlo por parte de cualquier departamento de gobierno, agencia oficial u organismo de justicia o policial. WWW.FERIAMOS.COM no tendrá responsabilidad algún si, por cualquier motivo, pierde, extravía o elimina todo o parte de la información suministrada por el Usuario. El Usuario pierde todos los derechos que pudiese haber contraído con WWW.FERIAMOS.COM con respecto a dicha perdida no teniendo nada que reclamar. Es responsabilidad del Usuario mantener la confidencialidad de su contraseña (Password) y nombre de cuenta (User ID). Además, es responsable de todas las actividades que se desarrollen en su cuenta y acepta informar a WWW.FERIAMOS.COM inmediatamente ante cualquier uso no autorizado de la cuenta. WWW.FERIAMOS.COM no se hace responsable de cualquier pérdida que se pueda producir como resultado del uso no autorizado de la cuenta o la contraseña. WWW.FERIAMOS.COM no es responsable por ninguna información o material publicado o transmitido a través de este servicio.</p>
            <p>WWW.FERIAMOS.COM tiene el derecho de actualizar o modificar las condiciones, contenido y avisos de sus servicios periódicamente para reflejar cambios en dichos servicios, cambios en las leyes que afectan a los servicios o por cualquier otro motivo. WWW.FERIAMOS.COM se reserva el derecho de realizar estos cambios. Es responsabilidad del Usuario comprobar estas condiciones y avisos periódicamente. La obtención continuada de acceso o el uso de los servicios ofrecidos por WWW.FERIAMOS.COM después de que se haya llevado a cabo cualquier modificación implicará que el Usuario acepta dicho cambio. A menos que se indique explícitamente lo contrario, cualquier característica nueva que modifique o mejore los servicios de WWW.FERIAMOS.COM estará sujeta a las condiciones de uso y a sus modificaciones. Todos los Usuarios estarán limitados por los términos enmendados desde el momento de dicha publicación. Bajo ninguna circunstancia WWW.FERIAMOS.COM es responsable de los actos consecuentes o fortuitos resultantes del uso de sus servicios. WWW.FERIAMOS.COM se exime de toda responsabilidad en su totalidad permitida por la ley, independientemente de la forma de acción, por los actos u omisiones de otros usuarios.</p>
            <p>Este Acuerdo no puede limitar o excluir las responsabilidades de WWW.FERIAMOS.COM donde y hasta el punto que la ley aplicable prohíba tal exclusión o limitación. Si un Usuario no notifica a WWW.FERIAMOS.COM antes de 3 meses acerca de alguna conducta relevante sobre cuáles de los derechos, acciones, procedimientos o quejas han sido presentadas, según lo permitido por la ley, el Usuario libera por esta clausula a WWW.FERIAMOS.COM de todos los derechos, acciones, procedimientos y quejas que el Usuario pudiese haber contraído con WWW.FERIAMOS.COM.</p>
            <p>WWW.FERIAMOS.COM advierte a los Usuarios que hay riesgos de relacionarse con otras personas a través de Internet. Advierte la existencia de gente con falsa apariencia o con propósitos criminales ofreciendo atractivos negocios que pueden ser fraudulentos. WWW.FERIAMOS.COM exhorta a sus Usuarios a informar inmediatamente a las autoridades competentes tan pronto tengan sospechas de cualquier actitud maliciosa.</p>
            <p>Debido a que la autentificación de usuarios en Internet es muy difícil de garantizar, no se puede confirmar que cada usuario es quien dice ser. Ante todo, el Usuario debe ser cuidadoso al relacionarse con otros usuarios. No obstante, la plataforma de WWW.FERIAMOS.COM es un servicio que pretende acercar vendedores con compradores, reiteramos que una vez se establezca la relación entre usuario vendedor y usuario comprador, nosotros no intervenimos en ninguna actividad propia del negocio que pueda concretarse; por tal razón, no nos involucramos en las comunicaciones y actividades Usuario a Usuario. En caso de que haya un conflicto entre estos, el Usuario libera a WWW.FERIAMOS.COM de cualquier reclamo, demanda y datos (actuales, directos, indirectos y consecuentes) de cualquier clase y naturaleza, conocidos y desconocidos, sospechados e insospechados, divulgados y sin revelar, que se encuentren presente, fuera o involucrados en dicho conflicto.</p>
            <p>El Usuario es el único responsable por toda información proporcionada a WWW.FERIAMOS.COM y otros usuarios.WWW.FERIAMOS.COM puede tomar acción respecto a la información de un Usuario si juzga necesaria o apropiada bajo su sola discreción. Si WWW.FERIAMOS.COM piensa que una información (un aviso publicitario, por ejemplo) puede crearnos responsabilidades, o si puede causarnos la perdida (todo o una parte) del acceso a los servicios de nuestros Proveedores de Acceso a Internet u otros proveedores, WWW.FERIAMOS.COM puede alterar o eliminar todo o parte de dicha Información. Las provisiones de este acuerdo son ajustables, si cualquiera clausula de este acuerdo es encontrada no valido, dicha clausula podrá ser omitida y el resto del acuerdo seguirá siendo válido.</p>
            <p>USUARIOS DE LA PAGINA WEB: Cuando una persona ingresa y se registra en la página de WWW.FERIAMOS.COM se convierte automáticamente en Usuario de nuestros servicios, aceptando conocer y cumplir los términos y condiciones descritos en este documento relacionados y aplicables al uso de los servicios proporcionados por WWW.FERIAMOS.COM a sus Usuarios, sin embargo se utilizará un sistema de registro de usuarios el cual se describe así:</p>
            <p>Para poder acceder a los servicios del Sitio, el Usuario deberá completar el Formulario de Registro (el Formulario) con su información personal (en adelante, "Datos Personales") de manera correcta, actual y completa. Adicionalmente, el Usuario asume el compromiso de actualizar en todo momento los Datos Personales a fin de conservarlos, correctos, actuales y completos.</p>
            <p>WWW.FERIAMOS.COM podrá utilizar diversos medios para identificar a sus Usuarios, pero WWW.FERIAMOS.COM NO se responsabiliza por la certeza de los Datos Personales provistos por sus Usuarios. Los Usuarios garantizan y responden, en cualquier caso, de la veracidad, exactitud, vigencia y autenticidad de los Datos Personales ingresados.</p>
            <p>El seudónimo que utilice el usuario dentro del Sitio, deberá ser elegido conforme a las Política de ID de Usuario y Mensaje Personal. El Usuario accederá a su cuenta personal ("Cuenta") mediante el ingreso de su e-mail y contraseña. El Usuario se obliga a mantener la confidencialidad de su contraseña. Toda información suministrada por el Usuario, los Datos Personales y otros datos e información, se usarán de acuerdo a las Políticas de Privacidad de WWW.FERIAMOS.COM.  Igualmente, nos reservamos el derecho de rechazar cualquier solicitud de inscripción o de cancelar un registro sin estar obligado a comunicar o exponer las razones de la decisión y sin que ello genere derecho alguno a indemnización o resarcimiento.</p>
            <p>USOS PROHIBIDOS DE LA PAGINA WEB: Como condición para el uso de los servicios del portal WWW.FERIAMOS.COM, el Usuario debe garantizar no utilizar los servicios con ningún propósito ilegal contrario a estas Condiciones de uso ni a las leyes nacionales o internacionales vigentes. No deberá utilizar los servicios de un modo que pueda dañar, inhabilitar, sobrecargar o afectar a dichos servicios o bien interferir con su utilización y disfrute por parte de un tercero. No puede intentar obtener acceso no autorizado a cualquier cuenta de WWW.FERIAMOS.COM u otros Usuarios, equipos o redes asociadas. No puede obtener ni intentar obtener ningún material o información a través de ningún medio que no se haya puesto a disposición expresamente u ofrecido a través de los servicios de WWW.FERIAMOS.COM . Los servicios contratados con WWW.FERIAMOS.COM deben ser utilizados exclusivamente con fines ilícitos. Queda estrictamente prohibido el uso de cualquiera de los servicios contratados con fines que violen cualquier ley local, nacional o internacional o simplemente afecten la moral y las buenas costumbres o sean ofensivos para cualquier persona o grupo de personas. Mientras utilice los servicios contratados con WWW.FERIAMOS.COM, el usuario no podrá a manera de ejemplo, realizar lo siguiente: Divulgar o transmitir información ilegal, abusiva, difamatoria, racista, ofensiva, o cualquier otro tipo de información susceptible de objeción, ya sea mediante fotografías, textos, banners publicitarios o enlaces a páginas externas. Publicar, transmitir, reproducir, distribuir o explotar cualquier información o software que contenga virus o cualquier otro componente dañino. Publicar, transmitir, reproducir, distribuir o explotar software u otro material que no sea original. Publicar, transmitir, reproducir, distribuir o explotar material que pueda infringir derechos de propiedad intelectual. Publicar sitios que tengan como objetivo la obtención ilegal de claves de acceso a cuentas de email o cuentas bancarias. Publicar o facilitar material o recursos sobre hacking, cracking, o cualquier otra información que se considere inapropiada. Publicar, transmitir, reproducir, distribuir o explotar material que contenga pornografía infantil o cualquier mercadotecnia relacionada.</p>
            <p>El usuario es responsable y se compromete a que su comportamiento con otros usuarios u otras personas contactadas a través del portal de WWW.FERIAMOS.COM es ético, legal y cumple con todas las leyes aplicables. Es así como el usuario será absolutamente responsable por los contenidos incorporados en sus sitios, y por las consecuencias que estos contenidos puedan traer al servidor, al dominio, a y/o a terceras personas, debiéndose hacer cargo de los costos surgidos de las acciones requeridas para la suspensión de las causas del daño y cualquier otro costo o indemnización fijada por la justicia en caso de intervenir. Cualquier uso del servicio para fines ilícitos autorizará a suspender los servicios sin previo aviso.</p>
            <p>BIENES QUE SE OFRECEN ATRAVES DE LA PAGINA WEB: El Usuario podrá poner a la venta bienes que desea vender, siempre que no estén prohibidos en el listado de Artículos Prohibidos establecida por WWW.FERIAMOS.COM, el cual se encuentra descritos en este Acuerdo. Las descripciones de los productos podrán incluir descripciones de texto, gráficos y fotos que el Usuario proporcione al Sitio, y que describan el producto que va a ser vendido y los términos y condiciones de venta del mismo. El vendedor debe inscribir sus productos en la categoría apropiada y deberán establecer las condiciones de venta de los artículos que están ofreciendo. Se entiende y presume que, mediante la inclusión del bien o servicio en el Sitio, el Usuario manifiesta tener la intención y el derecho de vender el bien por el ofrecido, o está facultado para ello por su titular y lo tiene disponible para su entrega inmediata. WWW.FERIAMOS.COM podrá remover cualquier publicación cuyo contenido no sea expresado conforme lo detallado precedentemente.</p>
            <p>WWW.FERIAMOS.COM ACTÚA MERAMENTE COMO UN CONDUCTO PASIVO EN LA PUBLICACION Y DISTRIBUCIÓN DE LA INFORMACION PROPORCIONADA POR LOS USUARIOS y no participa en las Transacciones, es un proveedor de servicios que mantiene un portal que actúa como un foro, para que vendedores y compradores intercambien información, presenten ofertas sobre productos y servicios y realicen transacciones entre sí o con otras personas, no es el propietario de los artículos, no toma posesión de ellos y no los ofrece en venta. WWW.FERIAMOS.COM no interviene en el perfeccionamiento de las operaciones realizadas entre los Usuarios ni en las condiciones por ellos estipuladas para los mismos. Los Usuarios serán responsables por los términos específicos y condiciones de una Transacción (por ejemplo, precios, garantías de los vendedores, opciones de entrega y pagos de los compradores), y de la retención de cualquier impuesto asociado con el producto, sea local, nacional o internacional, u otros impuestos similares. </p>
            <p>Los Usuarios reconocen y aceptan que WWW.FERIAMOS.COM, No es parte de ninguna Transacción. No ejerce ningún control sobre los términos o contenidos de las Transacciones. No especifica, determina o establece el precio, términos para la realización de la Transacción, calidad, seguridad, conformidad o legalidad de los productos ni de los servicios anunciados u ofrecidos para venta o la veracidad de las descripciones sobre los productos, así como tampoco podrá asegurar que un comprador o un vendedor concluirá la Transacción. No reconocerá responsabilidad alguna con respecto al pago o cobranza de ordenes hechas y/u ofertas realizadas en el Sitio.</p>
            <p>No podrá verificar la supuesta identidad de cada oferente o vendedor en virtud de la dificultad de verificación de identidad de usuarios en Internet. Como resultado de lo anterior, los Usuarios deberán asumir el riesgo de no poder identificar a la persona con quien efectúan una Transacción. No será responsable por el efectivo cumplimiento de las obligaciones asumidas por los Usuarios en el perfeccionamiento de la operación. No será responsable por la realización de ofertas y/o operaciones con otros Usuarios basadas en la confianza depositada en el sistema o los servicios brindados por WWW.FERIAMOS.COM .</p>
            <p>El Usuario conoce y acepta que al realizar operaciones con otros Usuarios o terceros lo hace bajo su propio riesgo. En ningún caso WWW.FERIAMOS.COM será responsable por lucro cesante, o por cualquier otro daño y/o perjuicio que haya podido sufrir el Usuario, debido a las operaciones realizadas o no realizadas por artículos publicados a través del Sitio. En el caso en que uno o más usuarios o algún tercero inicien cualquier tipo de reclamo, disputa o acciones legales contra otro u otros usuarios respecto a una transacción, negocio, o por cualquier causa, los usuarios involucrados eximen de toda responsabilidad a WWW.FERIAMOS.COM, sus directores, socios, agentes, apoderados y empleados.</p>
            <p>REGIMEN APLICABLE A LAS TARIFAS: El registro en el Sitio es gratuito. Una vez que el Usuario se registra en WWW.FERIAMOS.COM, dará por aceptada la Tarifa que se compromete a pagar a WWW.FERIAMOS.COM, como bonificación por el servicio prestado. Dicha comisión, solo se hará efectiva si la venta se lleva a cabo por las partes y debe ser asumida por el usuario vendedor. El Usuario se obliga a pagar a WWW.FERIAMOS.COM únicamente el monto correspondiente al porcentaje establecido por la venta del producto o bien. A menos que se establezca de otra forma, los pagos serán cancelados en pesos colombianos. En caso de introducción de un nuevo servicio, las tarifas por dicho servicio serán efectivas en el momento de lanzamiento del servicio. El usuario es responsable del pago de todas las tarifas asociadas al uso de los servicios de WWW.FERIAMOS.COM, así como de todos los impuestos aplicables.</p>
            <p>CONFORMIDAD DEL USUARIO CON LEGISLACIÓN APLICABLE, INCLUYENDO LEYES SOBRE EXPORTACIÓN E IMPORTACION: El Usuario acepta y reconoce que la principal obligación, entre vendedores y compradores, que se deriva de la transacción, es la de cumplir, bajo su propia responsabilidad y riesgo, con los términos de la transacción, conforme lo acordado entre vendedores y compradores así como con todas las leyes locales o regulaciones internacionales que se apliquen a la transacción, incluyendo el pago de impuestos o derechos de aduana, legislación de cambio de moneda y leyes y regulaciones de exportación o importación. WWW.FERIAMOS.COM no será responsable del incumplimiento por parte de un Usuario de los términos de la transacción, ni de la violación, por parte de los usuarios, de las normas y regulaciones aplicables a la transacción. </p>
            <p>COMENTARIOS Y SUGERENCIAS: WWW.FERIAMOS.COM desea y alienta que los Usuarios envíen comentarios y sugerencias de manera voluntaria acerca de los servicios que les ofrece, de manera que se puedan mejorar los servicios continuamente para todos los clientes. Si un Usuario envía comentarios y sugerencias, se entiende que el Usuario le concede a WWW.FERIAMOS.COM completo derecho a utilizarlos sin ningún obstáculo. En particular, al enviar cualquier tipo de comentario o sugerencia relacionada con los servicios, el Usuario garantiza que es el propietario o que controla los derechos necesarios para hacerlo y que autoriza a WWW.FERIAMOS.COM a: Usar, modificar, copiar, distribuir, transmitir, exhibir y ejecutar públicamente, reproducir, publicar, conceder bajo licencia a terceros, crear obras derivadas, ceder o vender dichos comentarios o sugerencias. Conceder bajo licencia a terceros el derecho ilimitado a ejercer cualquiera de los derechos anteriormente otorgados respecto a estos comentarios o sugerencias. Estas concesiones incluyen el derecho de explotación de cualquier derecho de propiedad de los comentarios o sugerencias, incluidos los derechos de autor y las marcas o patentes en cualquier jurisdicción afectada. WWW.FERIAMOS.COM no abonara ninguna compensación por el uso que haga del material contenido en tales comentarios o sugerencias y no esta obligada a exponer o usar ningún material que el Usuario pueda facilitar y podrá retirar discrecionalmente dicho material en cualquier momento.</p>
            <p>INDEPENDENCIA DE WWW.FERIAMOS.COM CON LOS USUARIOS DE LA PAGINA WEB: WWW.FERIAMOS.COM en ningún caso podrá celebrar, ejecutar o realizar ninguna clase de acto, operación, contrato o negocio por cuenta del usuario, ni será su representante, agente, intermediario o mandatario en o con las actividades desarrolladas por este, ni de aquellas efectuadas por causa o con ocasión del presente negocio jurídico. En consecuencia, el usuario y WWW.FERIAMOS.COM, directamente reconocen y así lo aceptan expresamente que en los servicios prestados a través de la página web se desarrollan conforme a lo pactado en él estos términos y condiciones. Así las cosas, es deber del usuario, y en ningún caso de WWW.FERIAMOS.COM, asumir toda clase de obligaciones laborales, civiles, comerciales, fiscales, y en general, todos los vínculos que generare por causa y con ocasión del presente contrato, para lo cual acepta expresamente que las obligaciones que realice al respecto será de su única y exclusiva responsabilidad.</p>
            <p>ORIGEN DE FONDOS Los usuarios que ofrecen sus productos a través de la pagina web WWW.FERIAMOS.COM y aquellos que pretenden adquirir cualquier bien o servicio en la misma, reconocen que los recursos destinados para la cancelación del precio o para adquirir o desarrollar dichos bienes o servicios han sido adquiridos por cada una de ellas en forma ilícita y devienen de actividades legitimas. Por tanto dichos bienes no pueden provenir de las siguientes circunstancias, a saber:</p>
            <p>El bien o los bienes de que se trate provengan directa o indirectamente de una actividad ilícita, Los bienes de que se trate hayan sido utilizados como medio o instrumento para la comisión de actividades ilícitas, sean destinadas a estas, o correspondan al objeto del delito. Los bienes o recursos de que se trate provengan de la enajenación o permuta de otros que tengan su origen, directa o indirectamente, en actividades ilícitas, o que hayan sido destinados a actividades ilícitas o sean producto, efecto, instrumento u objeto del ilícito. Los bienes o recursos de que se trate hubieren sido afectados dentro de un proceso penal y que el origen de tales bienes, su utilización o destinación ilícita no hayan sido objeto de investigación o habiéndolo sido, no se hubiese tomado sobre ellos una decisión definitiva por cualquier causa. Los derechos de que se trate recaigan sobre bienes de procedencia licita, pero que hayan sido utilizados o destinados a ocultar o mezclar bienes de ilícita procedencia.</p>
            <p>LEY APLICABLE Y JURISDICCIÓN: Cualquier controversia que surja en relación con lo establecido en estos términos y condiciones de participación, se someterá a un Tribunal de Arbitramento que se instalará, organizará y funcionará conforme a las reglas del Centro de Arbitraje y Conciliación de la Cámara de Comercio de Bogotá, que estará integrado por un (1) arbitro, designados por la mencionada Cámara, que sesionara en Bogotá en las instalaciones de dicho Centro, fallara en derecho, y en lo aquí no dispuesto se regirá por lo dispuesto en la Ley Colombiana. Las partes irrevocablemente renuncian a ejecutar cualquier objeción basado en la jurisdicción o contender esta bajo cualquier argumento por razón de sus domicilios presentes, futuros o por cualquier otra causa.</p>
          </div>
          <br>
          <div class="checkbox">
            <label>
              <input type="checkbox" id="terminoscheckbox" onChange="onchange_terminosycondiciones()"> Acepta terminos y condiciones.
            </label>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" id="change" disabled="disabled">Registrese</button>
        </form>
      </div>
    </div>
<?php $contenido = ob_get_clean() ?>
 
<?php include 'base.php' ?>