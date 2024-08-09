@extends('layouts.layouts')

@section('title', 'Sistem Pakar')

@section('pageName', 'Dashboard')
@section('content')
    <div>
        <div class= "w-full m-3">
            @include('components.grafik')
        </div>
        <div class="w-full mt-11">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Table Example
            </p>
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Last Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Phone</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                            <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                            <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                            <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                            <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                            <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                            <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                            <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                            <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                            <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                        </tr>
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">Lian</td>
                            <td class="py-4 px-6 border-b border-grey-light">Smith</td>
                            <td class="py-4 px-6 border-b border-grey-light">622322662</td>
                            <td class="py-4 px-6 border-b border-grey-light">jonsmith@mail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="pt-3 text-gray-600">
                Source: <a class="underline" href="https://tailwindcomponents.com/component/table">https://tailwindcomponents.com/component/table</a>
            </p>
        </div>
    </div>
@endsection
