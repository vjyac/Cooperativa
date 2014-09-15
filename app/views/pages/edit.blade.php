@extends('layouts.default')

@section('content')




<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
  <div class="pi-section pi-padding-bottom-80">

    <div class="pi-text-center pi-margin-bottom-60">
      <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
        Agregar Pagina
      </h1>
    </div>


    <!-- Row -->
    <div class="pi-row">

      <!-- Col 6 -->
      <div class="pi-col-xs-12">

        <h4 class="pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-25">
          Datos de la nueva pagina
        </h4>

        <hr class="pi-divider-gap-10">

        <!-- Forms -->
        {{ Form::open(array('url' => URL::to('/pages/' . $page->id), 'method' => 'PUT', 'class' => 'panel-body wrapper-lg')) }}
          <!-- First name form -->
          <div class="form-group">
            <label for="titular">Page</label>

            <div class="pi-input-with-icon">
              <div class="pi-input-icon"><i class="icon-pencil"></i></div>
              {{ Form::text('page', $page->page, array('class' => 'form-control', 'id' => 'page', 'placeholder' => 'Ingrese el titular')) }}
              <?php if ($errors->first('page')) { ?>
                  <div class="pi-alert-danger fade in">
                    <button type="button" class="pi-close" data-dismiss="alert">
                      <i class="icon-cancel"></i>
                    </button>
                    <p>
                      <strong>Oh !</strong> {{ $errors->first('page') }}.
                    </p>
                  </div>
              <?php } ?>

            </div>
          </div>
          <!-- End first name form -->

          <!-- Message -->
          <div class="form-group">
            <label for="articulo">Pagina HTML</label>

            <div class="pi-input-with-icon">
              <div class="pi-input-icon"><i class="icon-pencil"></i></div>
              <textarea class="form-control" id="html" name="html" placeholder="texto html" rows="30">{{$page->html}}</textarea>
              <?php if ($errors->first('html')) { ?>
                  <div class="pi-alert-danger fade in">
                    <button type="button" class="pi-close" data-dismiss="alert">
                      <i class="icon-cancel"></i>
                    </button>
                    <p>
                      <strong>Oh !</strong> {{ $errors->first('html') }}.
                    </p>
                  </div>
              <?php } ?>

            </div>
          </div>
          <!-- End message form -->


          <!-- Message -->
          <div class="form-group">
            <label for="exampleInputMessage-3">Activo</label>

              {{ Form::select('activo', array('si' => 'Si', 'no' => 'No'), $page->activo, array('class' => 'form-control input-lg', 'id' =>'comentarios')) }}

          </div>
          <!-- End message form -->

          <!-- Message -->
          <div class="form-group">
            <label for="exampleInputMessage-3">Mostrar Menu</label>

              {{ Form::select('mostrar_menu', array('si' => 'Si', 'no' => 'No'), $page->mostrar_menu, array('class' => 'form-control input-lg', 'id' =>'mostrar_menu')) }}

          </div>
          <!-- End message form -->


          <!-- First name form -->
          <div class="form-group">
            <label for="titular">Url SEO</label>

            <div class="pi-input-with-icon">
              <div class="pi-input-icon"><i class="icon-pencil"></i></div>
              {{ Form::text('url_seo', $page->url_seo, array('class' => 'form-control', 'id' => 'url_seo', 'placeholder' => 'Ingrese URL CEO')) }}
                <?php if ($errors->first('url_seo')) { ?>
                    <div class="pi-alert-danger fade in">
                      <button type="button" class="pi-close" data-dismiss="alert">
                        <i class="icon-cancel"></i>
                      </button>
                      <p>
                        <strong>Oh !</strong> {{ $errors->first('url_seo') }}.
                      </p>
                    </div>
                <?php } ?>
            </div>
          </div>
          <!-- End first name form -->


          <hr class="pi-divider-gap-10">

          <!-- Submit button -->
          <p>
            <button type="submit" class="btn pi-btn-base pi-btn-big pi-uppercase pi-weight-700 pi-letter-spacing">
              <i class="icon-check pi-icon-left"></i>Editar
            </button>
          </p>
          <!-- End submit button -->

        </form>
        <!-- End forms -->

      </div>
      <!-- End col 6 -->


  </div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - -->





@stop
