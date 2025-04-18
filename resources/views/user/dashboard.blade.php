@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-2xl font-bold mb-6 text-center">Dashboard User</h1>

        <!-- Flexbox Layout for Forum Button and Courses -->
        <div class="flex justify-between mb-8">
            <div class="w-full md:w-1/4 p-4">
                <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
                <div>
                    <a href="{{ route('user.forums.myforums') }}"
                        class="btn-info text-decoration-none bg-black text-white px-4 py-2 rounded-lg shadow-md hover:bg-grey-700 transition w-full">Forum</a>
                </div>
            </div>

            <!-- Top Courses Section -->
            <div class="w-full md:w-full p-4 ">
                <h1 class="text-xl font-semibold mb-4">
                    Top Courses
                    <span class="badge text-bg-secondary">
                        Best Sellers
                    </span>
                </h1>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-2">
                    @foreach ($courses as $c)
                        <div class="card border rounded-lg shadow-lg">
                            <img src="{{ asset('images/Gitar.jpeg') }}" class="card-img-top rounded-t-lg" alt="Course Image"
                                style="max-height: 200px; object-fit: cover;">
                            <div class="card-body p-4">
                                <h5 class="card-title text-xl font-semibold">{{ $c->nama_course }}</h5>
                                <p class="card-text text-gray-700 text-sm mb-4">Penjelasan Template
                                    {{ Str::limit($c->description, 100) }}, Oleh: {{ $c->user->name ?? 'Tidak diketahui' }}
                                </p>

                                <a href="{{ route('courses.show', $c) }}" class="text-green-600 hover:underline">Lihat
                                    Detail</a>
                            </div>
                            <div class="text-right p-2 border-t border-gray-200">
                                <small class="text-gray-500">{{ $c->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex-col justify-between mb-8">
            <h2 class="text-xl font-semibold text-left">More Courses <span class="badge text-bg-secondary">Best
                    Coaches</span></h2>

            <hr class="mb-8">
            {{-- todo! kalau dipakai tolong gunakan sesuai kegunaannya! id courseContainer ini aku kurang tau fungsionalnya selain hide/show apalagi --}}
            {{-- <div id="coursesContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 hidden">
            </div> --}}
            @if (count($courses) == 0)
                <div class="text-center">
                    <p class="text-gray-500 text-2xl">Tidak ada kursus yang tersedia saat ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-2">
                    @foreach ($courses as $c)
                        <div class="card border rounded-lg shadow-lg">
                            <img src="{{ asset('images/Gitar.jpeg') }}" class="card-img-top rounded-t-lg" alt="Course Image"
                                style="max-height: 200px; object-fit: cover;">
                            <div class="card-body p-4">
                                <h5 class="card-title text-xl font-semibold">{{ $c->nama_course }}</h5>
                                <p class="card-text text-gray-700 text-sm mb-4">Penjelasan Template
                                    {{ Str::limit($c->description, 100) }}, Oleh: {{ $c->user->name ?? 'Tidak diketahui' }}
                                </p>

                                <a href="{{ route('courses.show', $c) }}" class="text-green-600 hover:underline">Lihat
                                    Detail</a>
                            </div>
                            <div class="text-right p-2 border-t border-gray-200">
                                <small class="text-gray-500">{{ $c->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('toggleCoursesBtn').addEventListener('click', function() {
            const container = document.getElementById('coursesContainer');
            container.classList.toggle('hidden');
        });
    </script>
@endsection
