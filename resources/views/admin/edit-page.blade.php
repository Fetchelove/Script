@extends('admin.layout')

@section('content')
	<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
      <i class="bi-chevron-right me-1 fs-6"></i>
      <a class="text-reset" href="{{ url('panel/admin/pages') }}">{{ __('admin.pages') }}</a>
			<i class="bi-chevron-right me-1 fs-6"></i>
			<span class="text-muted">{{ __('admin.edit') }}</span>
  </h5>

<div class="content">
	<div class="row">

		<div class="col-lg-12">

		@include('errors.errors-forms')

			<div class="card shadow-custom border-0">
				<div class="card-body p-lg-5">

					 <form method="post" action="{{ url('panel/admin/pages/edit', $data->id) }}">
             @csrf

		        <div class="row mb-3">
		          <label class="col-sm-2 col-form-label text-lg-end">{{ __('admin.title') }}</label>
		          <div class="col-sm-10">
		            <input value="{{ $data->title }}" name="title" type="text" class="form-control">
		          </div>
		        </div>

            <div class="row mb-3">
		          <label class="col-sm-2 col-form-label text-lg-end">{{ __('admin.slug') }}</label>
		          <div class="col-sm-10">
		            <input value="{{ $data->slug }}" name="slug"  type="text" class="form-control">
                <small class="d-block"><strong>{{ __('general.important') }}: {{ __('general.slug_lang_info') }}</strong></small>
		          </div>
		        </div>

						<div class="row mb-3">
		          <label class="col-sm-2 col-form-label text-lg-end">{{ __('admin.keywords') }} (SEO)</label>
		          <div class="col-sm-10">
		            <input value="{{ $data->keywords }}" name="keywords" type="text" class="form-control">
		          </div>
		        </div>

						<div class="row mb-3">
		          <label class="col-sm-2 col-form-labe text-lg-end">{{ __('admin.description') }}</label>
		          <div class="col-sm-10">
                <textarea class="form-control" name="description" rows="4">{{ $data->description }}</textarea>
		          </div>
		        </div>

		        <div class="row mb-3">
		          <label class="col-sm-2 col-form-labe text-lg-end">{{ __('general.language') }}</label>
		          <div class="col-sm-10">
		            <select name="lang" class="form-select">
                  @foreach (Languages::orderBy('name')->get() as $language)
                    <option @selected($data->lang == $language->abbreviation) value="{{$language->abbreviation}}">{{ $language->name }}</option>
                  @endforeach
		           </select>
               <small class="d-block">{{ __('general.page_lang') }}</small>
		          </div>
		        </div>

						<div class="row mb-3">
		          <label class="col-sm-2 col-form-labe text-lg-end">{{ __('general.who_can_access_this_page') }}</label>
		          <div class="col-sm-10">
		            <select name="access" class="form-select">
									<option @if ($data->access == 'all') selected="selected" @endif value="all">{{ __('general.all') }}</option>
										<option @if ($data->access == 'members') selected="selected" @endif value="members">{{ __('admin.only_users') }}</option>
											<option @if ($data->access == 'creators') selected="selected" @endif value="creators">{{ __('general.only_creators') }}</option>
		           </select>
		          </div>
		        </div>

            <div class="row mb-3">
		          <label class="col-sm-2 col-form-labe text-lg-end">{{ __('admin.content') }}</label>
		          <div class="col-sm-10">
                <textarea class="form-control" name="content" rows="4" id="content">{{ $data->content }}</textarea>
		          </div>
		        </div>

						<div class="row mb-3">
		          <div class="col-sm-10 offset-sm-2">
		            <button type="submit" class="btn btn-dark mt-3 px-5">{{ __('admin.save') }}</button>
		          </div>
		        </div>

		       </form>

				 </div><!-- card-body -->
 			</div><!-- card  -->
 		</div><!-- col-lg-12 -->

	</div><!-- end row -->
</div><!-- end content -->
@endsection

@section('javascript')
<script src="{{ asset('public/js/ckeditor/ckeditor-init.js') }}?v={{$settings->version}}" type="text/javascript"></script>
@endsection
