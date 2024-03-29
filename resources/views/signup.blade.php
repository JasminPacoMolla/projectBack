<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/x-icon" href="/img/faviconLogo.png"/>
    <title>Sign Up</title>
    <!-- <link href="https://cdn.tailwindcss.com" rel="stylesheet" /> -->
    <link rel="stylesheet" href="/css/tailwindcss.css"/>
    <link rel="stylesheet" href="/css/formValidate.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body  class="h-screen overflow-hidden flex items-center justify-center">
<div class="w-full min-h-screen flex items-center justify-center">
    <div class="w-full h-screen flex items-center justify-center">
        <div
            class="w-full sm:w-5/6 md:w-2/3 lg:w-1/2 xl:w-1/3 2xl:w-1/4 h-full bg-white flex items-center justify-center bg-gradient-to-r from-indigo-100 to-indigo-400 ">
            <div class="w-full px-12">
                <h2 class="text-center text-2xl font-bold tracking-wide text-gray-800">
                    Create your account
                </h2>
                <p class="text-center text-sm text-gray-600 mt-2">
                    Already have an account?
                    <a href="/login" class="text-blue-600 hover:text-blue-700 hover:underline" title="Sign In">Sign
                        in here</a>
                </p>

                <form class="my-8 text-sm" action="/signup" method="post">
                    @csrf
                    <div class="flex flex-col my-4">
                        <label for="name" class="text-gray-700">Name</label>
                        <input type="text" name="name" id="name"
                               class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-indigo-600 rounded text-sm text-gray-900"
                               placeholder="Enter your name" />
                        <div class="error relative flex-col">
                            <i class="fas fa-exclamation-circle failure-icon relative"></i>
                            <i class="fas fa-check-circle success-icon relative"></i>
                        </div>
                    </div>

                    <div class="flex flex-col my-4">
                        <label for="email" class="text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email"
                               class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-indigo-600 rounded text-sm text-gray-900"
                               placeholder="Enter your email" />
                        <div class="error relative flex-col">
                            <i class="fas fa-exclamation-circle failure-icon relative"></i>
                            <i class="fas fa-check-circle success-icon relative"></i>
                        </div>
                    </div>

                    <div class="flex flex-col my-4">
                        <label for="password" class="text-gray-700">Password</label>
                        <div x-data="{ show: false }" class="relative flex items-center mt-2">
                            <input :type=" show ? 'text': 'password' " name="password" id="password"
                                   class="flex-1 p-2 pr-10 border border-gray-300 focus:outline-none focus:ring-0 focus:border-indigo-600 rounded text-sm text-gray-900"
                                   placeholder="Enter your password" type="password" />

                            <button @click="show = !show" type="button"
                                    class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                    </path>
                                </svg>

                                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                     style="display: none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="error relative flex-col">
                            <i class="fas fa-exclamation-circle failure-icon relative"></i>
                            <i class="fas fa-check-circle success-icon relative"></i>
                        </div>
                    </div>

                    <div class="flex flex-col my-4">
                        <label for="password_confirmation" class="text-gray-700">Password Confirmation</label>
                        <div x-data="{ show: false }" class="relative flex items-center mt-2">
                            <input :type=" show ? 'text': 'password' " name="password_confirmation"
                                   id="password_confirmation"
                                   class="flex-1 p-2 pr-10 border border-gray-300 focus:outline-none focus:ring-0 focus:border-indigo-600 rounded text-sm text-gray-900"
                                   placeholder="Enter your password again" type="password" />

                            <button @click="show = !show" type="button"
                                    class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                                    </path>
                                </svg>

                                <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor"
                                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                     style="display: none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="error relative flex-col">
                            <i class="fas fa-exclamation-circle failure-icon relative"></i>
                            <i class="fas fa-check-circle success-icon relative"></i>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="termsAcceptation" id="termsAcceptation"
                               class="mr-2 focus:ring-0 rounded" />
                        <label for="termsAcceptation" class="text-gray-700">I accept the
                            <a href="#" class="text-blue-600 hover:text-blue-700 hover:underline">terms</a>
                            and
                            <a href="#" class="text-blue-600 hover:text-blue-700 hover:underline">privacy
                                policy</a></label>
                    </div>
                    <div class="error relative flex-col">
                        <i class="fas fa-exclamation-circle failure-icon relative"></i>
                        <i class="fas fa-check-circle success-icon relative"></i>
                    </div>

                    <div class="my-4 flex items-center justify-end space-x-4">
                        <button
                            id="btn-signUp"
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 rounded-lg px-8 py-2 text-gray-100 hover:shadow-xl transition duration-150 uppercase">
                            Sign Up
                        </button>
                    </div>
                </form>

                <div class="flex items-center justify-between">
                    <div class="w-full h-[1px] bg-gray-500"></div>
                    <span class="text-sm uppercase mx-6 text-gray-800">Or</span>
                    <div class="w-full h-[1px] bg-gray-500"></div>
                </div>

                <div class="text-sm">
                    <a href="#"
                       class="flex items-center justify-center space-x-2 text-gray-600 my-2 py-2 bg-gray-100 hover:bg-gray-200 rounded">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 326667 333333"
                             shape-rendering="geometricPrecision" text-rendering="geometricPrecision"
                             image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd">
                            <path
                                d="M326667 170370c0-13704-1112-23704-3518-34074H166667v61851h91851c-1851 15371-11851 38519-34074 54074l-311 2071 49476 38329 3428 342c31481-29074 49630-71852 49630-122593m0 0z"
                                fill="#4285f4"></path>
                            <path
                                d="M166667 333333c44999 0 82776-14815 110370-40370l-52593-40742c-14074 9815-32963 16667-57777 16667-44074 0-81481-29073-94816-69258l-1954 166-51447 39815-673 1870c27407 54444 83704 91852 148890 91852z"
                                fill="#34a853"></path>
                            <path
                                d="M71851 199630c-3518-10370-5555-21482-5555-32963 0-11482 2036-22593 5370-32963l-93-2209-52091-40455-1704 811C6482 114444 1 139814 1 166666s6482 52221 17777 74814l54074-41851m0 0z"
                                fill="#fbbc04"></path>
                            <path
                                d="M166667 64444c31296 0 52406 13519 64444 24816l47037-45926C249260 16482 211666 1 166667 1 101481 1 45185 37408 17777 91852l53889 41853c13520-40185 50927-69260 95001-69260m0 0z"
                                fill="#ea4335"></path>
                        </svg>
                        <span>Sign up with Google</span>
                    </a>
                    <a href="#"
                       class="flex items-center justify-center space-x-2 text-gray-600 my-2 py-2 bg-gray-100 hover:bg-gray-200 rounded">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 124.8 123.36">
                            <defs>
                                <style>
                                    .cls-1,
                                    .cls-2 {
                                        fill: none;
                                    }

                                    .cls-1 {
                                        clip-rule: evenodd;
                                    }

                                    .cls-3 {
                                        clip-path: url(#clip-path);
                                    }

                                    .cls-4 {
                                        clip-path: url(#clip-path-2);
                                    }

                                    .cls-5 {
                                        fill: #fff;
                                    }
                                </style>
                                <clipPath id="clip-path" transform="translate(0.69 0.51)">
                                    <path class="cls-1"
                                          d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z">
                                    </path>
                                </clipPath>
                                <clipPath id="clip-path-2" transform="translate(0.69 0.51)">
                                    <rect class="cls-2" width="122.88" height="122.31"></rect>
                                </clipPath>
                            </defs>
                            <g class="cls-3">
                                <g class="cls-4">
                                    <image width="260" height="257"
                                           transform="matrix(0.48, 0, 0, -0.48, 0, 123.36)"
                                           xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQQAAAEBCAYAAACexdu5AAAACXBIWXMAABcRAAAXEQHKJvM/AAAEFUlEQVR4Xu3dwXEdIRBFUb4kZ+HwHJbDcxrSeAG+hctVJgDO2cyG9aumoYfX8zzP68evAdzr+fl9jDHG22EdcJGPMcZ4vV6ndcAFPubn+f8q4Aq2DEBmhWDLAAxbBmCzAkGFAKgQgM3qIRxWAVdwygBkVQhyAdBUBDZKAyCaikBmIDxfh2XADda0o50DUFNRhQBoKgIbgQBEIABx7AhEhQBEIACZW4a398My4AYqBCACAYhZBiCrh6BQAFQIwGZOO55WAVewVwDin4pAVlNRIACaisDG689ANBWBeLkJyOoheP0Z8Bw8sNFUBKJCAKKbCEQgAHHsCGQ99npaBtxAaQDEsSMQ045ANBWBqBCAKA2AeA4eiAoBiEAAIhCA6CEAUSEAWcNNcgEwywBs3FQEYpYBiAoByHr9WYUAqBCAzXqXwSkD4KEWYOPqMhDHjkBsGYCYZQCyjh1VCEAXk3QVAT0EYCMQgDh2BLIqBLMMQBXC+2EZcAPTjkD0EICsm4qnZcANlAZAjD8D0VQEoqkIxNVlIEoDIJqKQOY9hNMq4AoqBCB6CEDWL9RMOwIqBGDjbUcgq6noYhJglgHYaCoCWRXC52EZcIP1xyRNRaAK4bAKuIKry0D8IAWIl5uAqBCA+IUakFUh6CoCph2BzbqHYMsAuIcAbGwZgPhBChAVApA17XhaBtxAhQBEIAARCEAEAhCzDEBMOwKxZQAiEIAYbgJilgGILQOQOctwWgVcQQ8BiC0DkPUcvFwA+smql5sALzcBG8NNQGwZgKx/KtoyAO4hABulARBNRSCaikDcQwCiqQjElgHIqhDeD8uAG6xfqKkQADcVgY2mIhBNRSCaikBWhfB5WAbcwCwDEMcLQNax42kZcAMVAhCBAMTFJCDr5Sb3EAA3FYHNPGVQIQBDUxHYuLoMRFMRiKYiEBUCEBeTgDhlADLvIZxWAVfwgxQgtgxANBWBzED4clMR7vZtjOEeArBxUxGIHgIQ/0MAYvwZGLUTD6uAi8xY0EQAhqYisHEPAYimIjDGmEWB8Wcgxp+BOHYEoqkIRFMRGH82C7YMQAw3AfkYY4zH/xDgcnOzoEIAYpYBiKYiEIEAxJYBiAoBiGlHILYMQPxTEYiXm4Dx103F8aa3CDhlADa2DMCwZQD+oUIAxt/jz/9dCNzCb9iBaB4AEQhAzDIAUSEAEQhAnDIAUSEAcTEJiFMGIAIByBpuOqwCrqBCACIQgNgyAFEhAHExCYhAADJvKtoyAEOFAGwEAhCBAEQgAHEPAYgKAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCACAQgAgGIQAAiEIAIBCACAYhAACIQgAgEIAIBiEAAIhCA/AafC2PbZ0osjAAAAABJRU5ErkJggg==">
                                    </image>
                                </g>
                            </g>
                            <path class="cls-5"
                                  d="M85.36,78.92l2.72-17.76H71V49.63c0-4.86,2.38-9.59,10-9.59H88.8V24.92a94.45,94.45,0,0,0-13.75-1.2c-14,0-23.21,8.5-23.21,23.9V61.16H36.24V78.92h15.6v43.57H71V78.92Z"
                                  transform="translate(0.69 0.51)"></path>
                        </svg>
                        <span>Sign up with Facebook</span>
                    </a>
                    <a href="#"
                       class="flex items-center justify-center space-x-2 text-gray-600 my-2 py-2 bg-gray-100 hover:bg-gray-200 rounded">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 122.31">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #0a66c2;
                                    }
                                    .cls-1,
                                    .cls-2 {
                                        fill-rule: evenodd;
                                    }
                                    .cls-2 {
                                        fill: #fff;
                                    }
                                </style>
                            </defs>
                            <title>linkedin-app</title>
                            <path class="cls-1"
                                  d="M27.75,0H95.13a27.83,27.83,0,0,1,27.75,27.75V94.57a27.83,27.83,0,0,1-27.75,27.74H27.75A27.83,27.83,0,0,1,0,94.57V27.75A27.83,27.83,0,0,1,27.75,0Z">
                            </path>
                            <path class="cls-2"
                                  d="M49.19,47.41H64.72v8h.22c2.17-3.88,7.45-8,15.34-8,16.39,0,19.42,10.2,19.42,23.47V98.94H83.51V74c0-5.71-.12-13.06-8.42-13.06s-9.72,6.21-9.72,12.65v25.4H49.19V47.41ZM40,31.79a8.42,8.42,0,1,1-8.42-8.42A8.43,8.43,0,0,1,40,31.79ZM23.18,47.41H40V98.94H23.18V47.41Z">
                            </path>
                        </svg>
                        <span>Sign up with LinkedIn</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Div logo -->
        <div class="hidden lg:flex lg:w-1/2 xl:w-2/3 2xl:w-3/4 h-full bg-cover" style="
                background-image: url('');">
            <div class="w-full h-full flex flex-col items-center justify-center bg-gray-50">
                <div class="flex items-center justify-center space-x-2">
                    <!-- Logo de la aplicación -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%"
                         viewBox="0 0 736 624" enable-background="new 0 0 736 624" xml:space="preserve" width="500" height="550">
                                <!-- Circulo externo -->
                        <path fill="#0f172a" opacity="1.000000" stroke="none" d="
                                    M437.048828,119.888657
                                    C463.171997,137.821655 481.242828,161.538269 491.695709,191.013596
                                    C496.730469,205.210831 499.056946,219.984802 499.252563,235.002945
                                    C499.513000,254.997345 499.206299,274.998871 499.420258,294.994385
                                    C499.468018,299.457245 498.068481,300.851715 493.681763,300.527649
                                    C488.543488,300.148071 483.334747,300.139130 478.196106,300.512939
                                    C473.180359,300.877838 471.535797,299.154724 471.593811,294.051514
                                    C471.826874,273.556885 471.977173,253.051315 471.563080,232.561829
                                    C471.063080,207.820328 462.737457,185.664917 447.509338,166.217361
                                    C433.821045,148.736328 416.265411,136.160431 395.481537,128.739929
                                    C368.747925,119.195190 341.392212,118.976700 314.873322,128.982834
                                    C277.210785,143.193680 251.831650,170.046066 242.136795,209.284775
                                    C233.778687,243.113113 240.213272,275.238007 261.415466,303.349304
                                    C283.785889,333.009521 313.873535,348.894226 351.211517,349.836090
                                    C372.196198,350.365479 393.203857,349.974609 414.201111,350.020569
                                    C421.044220,350.035553 421.271240,350.274963 421.294403,356.987335
                                    C421.312225,362.153290 421.184326,367.321838 421.310638,372.484589
                                    C421.390289,375.741333 420.406036,377.368988 416.787903,377.349060
                                    C394.124573,377.224213 371.431091,377.969391 348.803314,377.051880
                                    C312.892212,375.595856 281.331360,362.500946 255.338974,337.541809
                                    C232.621552,315.727478 218.191055,289.362152 213.449844,257.746002
                                    C208.357803,223.790497 213.996124,192.106964 232.150665,163.053726
                                    C253.777756,128.443283 284.900055,106.382935 324.787170,98.003281
                                    C364.866150,89.583328 402.474213,96.737068 437.048828,119.888657
                                    z" />
                        <!-- Circulo medio -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M410.351776,163.587723
                                    C430.615265,180.196686 444.377716,200.122299 446.323334,226.731567
                                    C448.632385,258.310699 446.730743,289.937134 447.389038,321.534119
                                    C447.468414,325.344360 445.840393,326.363251 442.316650,326.353210
                                    C412.507141,326.268433 382.680817,326.911835 352.892731,326.108032
                                    C328.498138,325.449829 306.703674,316.677551 289.363800,299.127136
                                    C274.803162,284.389709 267.018494,266.315674 264.441803,245.546646
                                    C262.333588,228.553772 265.668335,212.751282 272.075256,197.493683
                                    C276.748779,186.364136 284.938110,177.486633 293.737946,169.207260
                                    C308.908264,154.934174 327.080963,148.188675 347.552856,146.599228
                                    C370.398712,144.825500 391.281403,150.120575 410.351776,163.587723
                                    M410.256378,203.257065
                                    C394.889374,179.732468 361.908295,165.522842 330.915375,178.284714
                                    C296.290375,192.542114 280.665588,232.859848 298.935516,265.552856
                                    C311.969604,288.876678 333.064972,299.586670 359.616638,299.684052
                                    C377.774292,299.750641 395.933899,299.570160 414.089264,299.785126
                                    C418.501099,299.837372 419.803253,298.455597 419.752594,294.081940
                                    C419.542114,275.926483 419.502045,257.765045 419.731018,239.609940
                                    C419.892334,226.819031 416.689758,215.018860 410.256378,203.257065
                                    z" />
                        <!-- Letra d -->
                        <path fill="#0f172a" opacity="1.000000" stroke="none" d="
                                    M491.871948,457.891418
                                    C491.866516,459.706970 491.823700,461.040955 491.864716,462.372406
                                    C491.965302,465.638336 490.654846,467.398895 487.141510,467.160461
                                    C485.151642,467.025482 483.143463,467.106049 481.145447,467.159882
                                    C478.553253,467.229675 476.453888,466.684631 476.469299,463.430542
                                    C464.499603,469.369751 455.581696,468.488831 449.022675,460.900299
                                    C442.029846,452.809906 441.294586,438.164154 447.424744,429.070343
                                    C453.453064,420.127655 461.466614,418.649872 476.221558,423.992981
                                    C477.153839,419.865814 476.690430,415.737457 476.625305,411.686249
                                    C476.569275,408.200745 477.444489,406.485901 481.357758,406.595825
                                    C492.932831,406.921082 491.822632,405.116943 491.885742,416.953125
                                    C491.957642,430.437927 491.883423,443.923523 491.871948,457.891418
                                    M460.165436,437.791199
                                    C459.623016,439.178009 458.744904,440.530792 458.600220,441.957947
                                    C458.140259,446.496185 459.027924,450.615387 463.417145,453.095062
                                    C467.264618,455.268768 470.801941,454.595428 473.873199,451.577393
                                    C477.574738,447.940033 477.643799,440.215790 474.110443,436.457855
                                    C470.227478,432.328003 465.618286,432.577454 460.165436,437.791199
                                    z" />
                        <!-- Letra C -->
                        <path fill="#0f172a" opacity="1.000000" stroke="none" d="
                                    M387.276123,428.146057
                                    C381.451294,431.395447 373.641693,430.307739 369.152679,426.118561
                                    C365.574432,422.779358 361.343567,421.912048 356.660095,423.264893
                                    C351.305206,424.811707 347.710907,429.542816 347.312744,435.523743
                                    C346.741913,444.098206 349.402069,449.960571 355.013763,452.494873
                                    C360.372314,454.914856 365.515198,453.711792 370.349762,448.832886
                                    C371.291077,447.882904 372.060272,446.732819 373.572266,446.734406
                                    C378.030182,446.739075 382.508789,446.272552 387.502136,447.161896
                                    C386.711517,453.135071 383.672516,457.564880 379.379425,461.064758
                                    C367.796295,470.507660 349.538971,469.291473 339.260681,458.586548
                                    C329.381805,448.297516 329.156311,429.125122 338.785461,418.184204
                                    C348.365173,407.299591 366.423370,405.543121 378.374817,414.394653
                                    C382.930878,417.768951 386.138245,422.113403 387.276123,428.146057
                                    z" />
                        <!-- Letra a -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M236.291107,440.000763
                                    C236.289291,446.654327 236.298431,452.808044 236.284500,458.961670
                                    C236.265717,467.266632 236.258133,467.258484 227.731293,467.230804
                                    C224.738037,467.221100 221.536270,467.751953 220.453903,463.878632
                                    C206.581421,469.409790 197.932632,467.842865 191.934952,458.891571
                                    C185.550430,449.362946 186.594147,434.189972 194.001083,426.343109
                                    C199.534363,420.481110 210.499222,417.632111 220.384720,424.663849
                                    C222.635239,421.329498 231.121780,419.276428 234.636261,421.155975
                                    C236.286530,422.038544 236.242477,423.558685 236.256943,425.031708
                                    C236.304306,429.854401 236.285278,434.677765 236.291107,440.000763
                                    M220.843094,441.918091
                                    C219.724258,436.705719 216.277893,433.154816 212.020203,433.485596
                                    C207.935974,433.802948 204.825577,435.890961 203.628174,440.108124
                                    C202.069992,445.595764 203.994339,450.899200 207.989380,453.275726
                                    C213.218277,456.386230 222.354507,452.360626 220.843094,441.918091
                                    z" />
                        <!-- Letra P -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M164.542145,446.911133
                                    C154.759293,447.311127 155.422867,445.913391 155.398392,456.098328
                                    C155.395599,457.261841 155.394058,458.425323 155.388275,459.588837
                                    C155.350128,467.249817 155.349792,467.249847 147.785492,467.229370
                                    C140.700485,467.210236 140.679871,467.210236 140.673065,460.019806
                                    C140.659073,445.226562 140.799637,430.431458 140.589722,415.641205
                                    C140.527451,411.253876 141.616837,409.300537 146.402084,409.597656
                                    C152.528503,409.978027 158.696762,409.647156 164.846268,409.701538
                                    C176.140137,409.801422 183.701385,415.976715 184.309265,425.525116
                                    C185.096207,437.886322 179.633270,444.642303 167.430832,446.410828
                                    C166.609589,446.529877 165.797485,446.711914 164.542145,446.911133
                                    M155.361618,430.276917
                                    C154.993698,436.889069 159.993881,434.505676 163.031158,434.501099
                                    C167.066483,434.494965 169.441528,431.907440 169.448151,427.807007
                                    C169.451019,426.031342 168.685303,424.153442 166.904541,423.213409
                                    C163.689850,421.516357 159.969208,421.099609 156.788940,422.190460
                                    C153.966782,423.158478 155.857254,426.613525 155.370926,428.912842
                                    C155.337341,429.071594 155.364883,429.243317 155.361618,430.276917
                                    z" />
                        <!-- Letra e -->
                        <path fill="#0f172a" opacity="1.000000" stroke="none" d="
                                    M525.519592,420.764740
                                    C538.057434,424.337158 543.384399,431.074768 543.676208,442.959015
                                    C543.762512,446.472046 542.554749,448.130981 538.802490,448.093750
                                    C530.645630,448.012726 522.485901,448.210052 514.327698,448.318542
                                    C514.034546,448.322418 513.744934,448.589874 513.455444,448.738068
                                    C514.219788,454.230377 520.179993,457.343658 524.296082,453.700928
                                    C529.897400,448.743683 535.792664,451.460205 541.672668,450.914490
                                    C541.353943,458.239960 536.531555,463.669983 528.419495,466.406708
                                    C516.244019,470.514282 502.794952,464.281158 498.997070,452.770599
                                    C494.442871,438.967621 500.608124,425.400024 513.176208,421.435425
                                    C517.106384,420.195618 521.102356,420.802521 525.519592,420.764740
                                    M524.710754,433.708710
                                    C518.409851,431.540558 515.039001,432.948425 513.957703,438.582092
                                    C518.487427,438.806213 522.931519,439.282166 527.191772,438.260010
                                    C527.732788,435.894165 526.482910,435.024536 524.710754,433.708710
                                    z" />
                        <!-- Letra o -->
                        <path fill="#0f172a" opacity="1.000000" stroke="none" d="
                                    M422.320679,420.982544
                                    C433.296295,424.020416 439.051697,431.198120 439.996643,441.861481
                                    C440.778290,450.682343 437.824005,458.321045 430.199799,463.485931
                                    C419.662018,470.624542 404.224426,468.294342 396.848999,458.598633
                                    C389.709076,449.212524 391.310547,433.527985 400.200104,425.847565
                                    C406.553467,420.358429 414.121002,420.148743 422.320679,420.982544
                                    M409.520752,450.852417
                                    C412.006165,453.587036 414.761749,455.520844 418.691956,453.908112
                                    C422.259155,452.444366 424.249298,449.698517 424.594269,445.947876
                                    C424.984772,441.701752 424.714508,437.548920 420.549438,434.924713
                                    C416.045197,432.086792 410.693542,433.798798 408.586670,438.726532
                                    C406.912079,442.643158 407.122070,446.476929 409.520752,450.852417
                                    z" />
                        <!-- Dos cuadrados -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M492.780029,324.986908
                                    C497.632477,324.596313 499.686584,326.245087 499.378540,330.979614
                                    C499.033447,336.283966 499.184753,341.628784 499.302185,346.951996
                                    C499.373413,350.178192 498.009430,351.417816 494.834351,351.330017
                                    C489.844940,351.192047 484.827789,351.575684 479.861816,351.207153
                                    C474.942291,350.842041 472.813873,352.344788 473.227936,357.570709
                                    C473.621094,362.532318 473.182068,367.554138 473.340637,372.542114
                                    C473.446045,375.855804 472.404419,377.439301 468.812714,377.323151
                                    C462.660675,377.124207 456.496002,377.156464 450.340546,377.282227
                                    C446.860748,377.353302 445.611267,375.796875 445.675018,372.466003
                                    C445.786530,366.642944 445.806427,360.812897 445.644806,354.991882
                                    C445.553894,351.717316 446.930145,350.568848 450.081879,350.640900
                                    C455.737823,350.770233 461.413330,350.427094 467.053223,350.754150
                                    C471.577576,351.016510 472.925201,349.149780 472.710876,344.925568
                                    C472.449707,339.778320 472.803406,334.598694 472.511444,329.454620
                                    C472.318665,326.057983 473.734955,325.003784 476.827301,325.038879
                                    C481.985931,325.097473 487.146118,325.013367 492.780029,324.986908
                                    z" />
                        <!-- Letra s -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M249.792267,445.369934
                                    C241.003113,438.463531 242.304550,427.355408 252.206009,422.651581
                                    C258.710388,419.561676 265.518341,419.700623 272.079102,422.217224
                                    C277.975769,424.479126 281.251099,429.096741 281.792938,436.093506
                                    C276.379364,437.053253 271.128601,438.814636 266.734619,433.628174
                                    C265.722534,432.433594 264.218567,431.918488 262.719360,431.828430
                                    C261.021484,431.726379 259.167419,432.054565 258.578186,433.899963
                                    C257.924194,435.948029 259.532074,437.006561 261.159943,437.526031
                                    C264.322021,438.535004 267.583221,439.230286 270.756775,440.206787
                                    C278.666199,442.640472 282.270050,446.803223 282.274628,453.341248
                                    C282.279205,459.810486 278.112915,464.945648 270.311432,466.684265
                                    C263.213837,468.265961 256.079041,467.985046 249.654953,463.707764
                                    C247.383316,462.195221 245.567566,460.313843 244.277023,457.919495
                                    C241.412659,452.605072 242.430771,450.881042 248.513351,450.804260
                                    C252.438232,450.754700 256.527924,450.006714 259.051147,454.426666
                                    C259.891571,455.898834 261.888092,456.194366 263.552277,456.176453
                                    C265.218628,456.158478 267.037872,455.785492 267.549713,453.839600
                                    C268.132751,451.623047 266.304016,450.962616 264.761780,450.389160
                                    C259.943665,448.597717 254.673279,448.168793 249.792267,445.369934
                                    z" />
                        <!-- Letra s -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M307.134155,438.006287
                                    C310.380432,438.918213 313.316895,439.556702 316.142273,440.520721
                                    C323.590668,443.062134 327.236298,447.562775 327.039185,453.694641
                                    C326.851379,459.537415 323.072113,464.287598 315.979034,466.303772
                                    C308.172241,468.522827 300.459900,468.050293 293.591766,463.077057
                                    C291.285675,461.407196 289.410339,459.286865 288.315857,456.558929
                                    C286.482300,451.988861 287.130341,450.862701 291.978027,450.835052
                                    C296.356812,450.810120 301.026428,449.793488 303.971008,454.740845
                                    C304.555359,455.722626 306.621124,456.172333 308.028809,456.227539
                                    C309.857239,456.299225 311.905273,455.707550 312.348816,453.585510
                                    C312.795715,451.447388 310.890259,450.803040 309.311249,450.308044
                                    C306.140320,449.314056 302.901276,448.536774 299.733276,447.534424
                                    C291.708435,444.995422 288.589050,441.346191 288.678406,434.767487
                                    C288.769989,428.025879 292.823792,422.814209 300.449036,421.294800
                                    C308.063049,419.777679 315.864777,419.581055 321.927155,425.845795
                                    C324.438080,428.440582 327.864990,432.275757 325.277954,435.245972
                                    C322.845306,438.038910 317.812622,436.916901 313.914978,435.838165
                                    C313.223480,435.646820 312.787689,434.654633 312.139343,434.154785
                                    C311.232330,433.455475 310.296722,432.741608 309.266754,432.263672
                                    C306.863800,431.148529 304.250854,431.385773 303.182434,433.785187
                                    C301.850983,436.775360 304.918762,437.049164 307.134155,438.006287
                                    z" />
                        <!-- Cuadrado solo -->
                        <path fill="#645cff" opacity="1.000000" stroke="none" d="
                                    M517.285339,376.402222
                                    C524.755310,376.119080 525.213440,376.526337 525.239563,383.386353
                                    C525.258606,388.385712 525.184143,393.385376 525.196777,398.384796
                                    C525.203552,401.069214 523.980591,402.357605 521.250427,402.306396
                                    C515.918945,402.206360 510.586182,402.164520 505.253754,402.128723
                                    C501.342316,402.102448 499.367188,399.890869 499.171295,396.259918
                                    C498.893280,391.106110 498.954834,385.933777 498.879791,380.769257
                                    C498.835602,377.729980 500.597290,376.744843 503.354095,376.722412
                                    C507.851288,376.685852 512.347717,376.550171 517.285339,376.402222
                                    z" />
                        <!-- Circulo interior -->
                        <path fill="#0f172a" opacity="1.000000" stroke="none" d="
                                    M334.063354,269.049896
                                    C318.067841,258.230682 311.773041,240.454819 317.719299,223.595612
                                    C323.753906,206.485977 340.710236,195.286163 359.058594,197.215973
                                    C381.925720,199.621048 395.548401,218.414810 395.305206,236.188354
                                    C395.150421,247.500229 395.157654,258.817566 395.328339,270.128876
                                    C395.387207,274.032684 393.973236,275.397736 390.091187,275.343781
                                    C377.781281,275.172546 365.466919,275.346588 353.155731,275.231598
                                    C346.325470,275.167847 340.158600,272.735657 334.063354,269.049896
                                    M348.630554,245.983505
                                    C350.291107,247.639786 352.541016,247.669678 354.624664,248.115463
                                    C366.466095,250.648773 368.313232,249.108505 367.742340,237.238037
                                    C367.710449,236.575043 367.721893,235.900360 367.598541,235.252960
                                    C366.786346,230.990707 365.070648,227.369797 360.800537,225.475830
                                    C355.320740,223.045288 348.770355,224.543991 345.574097,229.031448
                                    C341.867096,234.235962 342.695831,239.864929 348.630554,245.983505
                                    z" />
                            </svg>
                </div>
                <p class="text-gray-500 mt-4 px-16 text-center">
                    Free admin dashboard template created with Tailwind CSS and
                    Alpine.js
                </p>
                <a href="index.html"
                   class="mt-6 bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded text-sm uppercase text-gray-900 transition duration-150"
                   title="Learn More">Learn More
                </a>
            </div>
        </div>
    </div>
</div>
<script type="module" src="/js/validateSingUp.js"></script>
</body>

</html>
