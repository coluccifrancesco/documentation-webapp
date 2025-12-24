@extends('layouts.app')

@section('content')


    <div class="container">
        
        @auth
            @if (Auth::user()->role === 'admin')
                <div class="my-3">
                    <h2>Sei l'admin</h2>
                </div>
            @endif
        @endauth

        <div class="d-flex align-items-center justify-content-between">
            <h1>{{ $argument->name }}</h1>

            <div class="d-flex align-items-center gap-3">
                @auth
                    @if (Auth::user()->role === 'admin')
                                    
                            <a href="">
                                <button class="btn btn-warning"><i class="fa-solid fa-pen-clip"></i></button>
                            </a>
                                        
                            <a href="">
                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </a>
                                
                    @endif
                @endauth

                <a href="{{ route('arguments.index') }}">
                    <button class="btn btn-primary">
                        <i class="fa-regular fa-house"></i>
                    </button>
                </a>
            </div>
        </div>

        <p class="w-50">{{ $argument->resume }}</p>

        <div id="md_text">{{ $argument->md_text }}</div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <p class="mb-0 me-3">{{ $argument->difficulty->grade_name }}</p>
                <p class="mb-0">{{ $argument->difficulty->grade_numerical }}</p>
            </div>
        
            <a href="{{ $argument->documentation_link }}">
                <button class="btn btn-primary">Docs</button>
            </a>
        </div>


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
