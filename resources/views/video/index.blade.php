@extends('template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4">
                <a class="btn btn-primary my-5" style="background-color: #cba7c1;" href="{{ route('vidio.create') }}">
                    <i class="bi bi-plus"></i> Add Video
                </a>
            </div>

            @if ($videos->count() > 0)
            @foreach ($videos as $video)
            <div class="card mb-4 border-0">
                <div class="card-body text-center"> <!-- Center align the content -->
                    <div class="position-relative"> <!-- Position relative for absolute positioning of trash icon -->
                        <video controls class="img-thumbnail" style="width: 100%">
                            <source src="{{ asset('/video/' . $video->video) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="position-absolute top-0 end-0 p-4">
                            <form action="{{ route('vidio.destroy', $video->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark btn-sm" style="background-color: #cba7c1;" onclick="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
                                    <i class="bi bi-trash3-fill"></i> 
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-2">
                        <strong>{{ $video->created_by }}</strong>
                    </div> 
                    <div>{{ $video->caption }}</div>
                    <div>{{ $video->created_at }}</div>
                </div>
            </div>
            @endforeach

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $videos->previousPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $videos->previousPageUrl() }}">Previous</a>
                            </li>
                            @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                                <li class="page-item {{ $loop->first ? 'active' : ''}}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach
                            <li class="page-item {{ $videos->nextPageUrl() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $videos->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            @else
            <div class="alert alert-info" style="background-color: #cba7c1;">No videos found.</div>
            @endif
        </div>
    </div>
</div>
@endsection
