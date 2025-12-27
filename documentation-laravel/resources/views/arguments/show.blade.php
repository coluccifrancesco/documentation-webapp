@extends('layouts.app')

@section('content')

    <div class="container">
    
        <div class="d-flex align-items-center justify-content-between mt-5 mb-2">
            <h1>{{ $argument->name }}</h1>

            <div class="d-flex align-items-center gap-3">
                @auth
                    @if (Auth::user()->role === 'admin')
                                    
                        <a href="{{ route('arguments.edit', $argument->id) }}">
                            <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                        </a>
                                        
                        <a href="{{ route('arguments.sureOfDestroy', $argument->id) }}">
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </a>
                                
                    @endif
                @endauth

                <a href="{{ route('arguments.index') }}">
                    <button class="btn btn-primary">
                        Go back<i class="ms-1 fa-solid fa-arrow-left"></i>
                    </button>
                </a>
            </div>
        </div>

        <div class="row">
            <p class="col-12 col-sm-7">{{ $argument->resume }}</p>

            <div class="col-12 col-sm-5 d-flex align-items-center justify-content-between">
                @foreach ($argument->technologies as $tech)
                    <div class="rounded py-2 px-3" style="background-color: {{ $tech->bg_color }}; color:{{ $tech->font_color }}">
                        <p class="mb-0">{{ $tech->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="d-flex justify-content-between align-items-center my-4">
            {{-- Difficulties showed by emojis and colors on a numerical scale --}}
            @if ($argument->difficulty->grade_numerical == 1)
                <div class="border rounded bg-success text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                    <i class="fa-solid fa-face-laugh-beam"></i>
                </div>
            @elseif ($argument->difficulty->grade_numerical == 2)
                <div class="border rounded bg-success text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                    <i class="fa-solid fa-face-grin-wink"></i>
                </div>
            @elseif ($argument->difficulty->grade_numerical == 3)
                <div class="border rounded bg-warning text-dark p-2 d-flex gap-2 align-items-center justify-content-between">
                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                    <i class="fa-solid fa-face-grin-beam-sweat"></i>
                </div>
            @elseif ($argument->difficulty->grade_numerical == 4)
                <div class="border rounded bg-warning text-dark p-2 d-flex gap-2 align-items-center justify-content-between">
                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                    <i class="fa-regular fa-face-grimace"></i>
                </div>
            @elseif ($argument->difficulty->grade_numerical > 4)
                <div class="border rounded bg-danger text-white p-2 d-flex gap-2 align-items-center justify-content-between">
                    <p class="mb-0">{{ $argument->difficulty->grade_name }}</p>
                    <i class="fa-solid fa-face-dizzy"></i>
                </div>
            @endif
        
            <a href="{{ $argument->documentation_link }}">
                <button class="btn btn-primary">Docs</button>
            </a>
        </div>
        
        @if ($argument->md_text != '')
            <div id="md_text" class="rounded bg-dark text-white p-5">{{ $argument->md_text }}</div>
        @endif

    </div>

    
    {{-- Markdown preview  --}}
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    {{-- Syntax highlight --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script>
        let mdText = document.getElementById('md_text');

        // Syntax highlight logic
        marked.setOptions({
            highlight: function(code, lang) {
                if (lang && hljs.getLanguage(lang)) {
                    return hljs.highlight(code, { language: lang }).value;
                }
                    
                return code;
            }
        });
                
        function markdownPreview() {
                    
            let htmlOutput = marked.parse(mdText.innerHTML);
                    
            mdText.innerHTML = htmlOutput;

            // Highlighting the syntax
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightElement(block);
            });
        }

        markdownPreview();
    </script>

@endsection
