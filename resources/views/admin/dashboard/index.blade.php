@extends('layouts.dashboard')

@section('content')
    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal">Today's Money
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        $53,000
                                        <span class="text-sm leading-normal font-weight-bolder text-lime-500">+55%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bbg-gradient-to-tl from-purple-700 to-pink-500"">
                                    <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card2 -->
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4">
                        <div class="flex flex-row -mx-3">
                            <div class="flex-none w-2/3 max-w-full px-3">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-semibold leading-normal">Today's Users
                                    </p>
                                    <h5 class="mb-0 font-bold">
                                        2,300
                                        <span class="text-sm leading-normal font-weight-bolder text-lime-500">+3%</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="px-3 text-right basis-1/3">
                                <div
                                    class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500">
                                    <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">

            <div class="w-full max-w-full px-3 mt-0 lg:flex-none">
                <div
                    class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                        <h6>Sales overview</h6>
                        <p class="text-sm leading-normal">
                        </p>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <canvas id="chart-line" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="pt-4">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700"
                                target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                        <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog"
                                    class="block px-4 pt-0 pb-1 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license"
                                    class="block px-4 pt-0 pb-1 pr-0 text-sm font-normal transition-colors ease-soft-in-out text-slate-500"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end cards -->
@endsection
