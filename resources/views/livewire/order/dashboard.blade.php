<div class="flex items-start gap-4" x-data="{state : $wire.entangle('searchState')}">
    <div class="flex-1 grid gap-4">
        <div class="flex flex-wrap gap-3">
            <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                     y="0px"
                     viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
<style type="text/css">
    .st0 {
        fill: none;
        stroke: #000000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
    }
</style>
                    <path class="st0"
                          d="M11,13H5c-1.1,0-2-0.9-2-2V5c0-1.1,0.9-2,2-2h6c1.1,0,2,0.9,2,2v6C13,12.1,12.1,13,11,13z"/>
                    <path class="st0"
                          d="M11,29H5c-1.1,0-2-0.9-2-2v-6c0-1.1,0.9-2,2-2h6c1.1,0,2,0.9,2,2v6C13,28.1,12.1,29,11,29z"/>
                    <line class="st0" x1="17" y1="5" x2="29" y2="5"/>
                    <line class="st0" x1="17" y1="9" x2="24" y2="9"/>
                    <line class="st0" x1="17" y1="21" x2="29" y2="21"/>
                    <line class="st0" x1="17" y1="25" x2="24" y2="25"/>
                    <polyline class="st0" points="6,7 8,9 11,6 "/>
</svg>

                <div>
                    <p class="text-gray-800 text-lg font-semibold">
                        <span>{{$this->summary["all"]["count"]}}</span> |
                        <span>{{$this->summary["all"]["funds"]}}</span>
                    </p>
                    <p class="text-gray-600 text-sm">{{$this->summary["all"]["name"]}}</p>
                </div>
            </div>
            <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                <svg class="w-10 h-10 text-gray-500" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M62 9C62 8.45 61.55 8 61 8H58C57.45 8 57 8.45 57 9C57 9.55 57.45 10 58 10H61C61.55 10 62 9.55 62 9Z"
                        fill="black"/>
                    <path
                        d="M60.89 14.45C61.14 13.95 60.94 13.35 60.45 13.11L58.45 12.11C57.95 11.86 57.35 12.06 57.11 12.55C56.86 13.05 57.06 13.65 57.55 13.89L59.55 14.89C59.7 14.97 59.85 15 60 15C60.37 15 60.72 14.8 60.89 14.45Z"
                        fill="black"/>
                    <path
                        d="M57.71 6.71L59.71 4.71C60.1 4.32 60.1 3.68 59.71 3.29C59.32 2.9 58.68 2.9 58.29 3.29L56.29 5.29C55.9 5.68 55.9 6.32 56.29 6.71C56.49 6.9 56.74 7 57 7C57.26 7 57.51 6.9 57.71 6.71Z"
                        fill="black"/>
                    <path
                        d="M55.55 15.11C55.06 15.35 54.86 15.95 55.11 16.45L56.11 18.45C56.28 18.8 56.63 19 57 19C57.15 19 57.3 18.97 57.45 18.89C57.94 18.65 58.14 18.05 57.89 17.55L56.89 15.55C56.65 15.06 56.05 14.86 55.55 15.11Z"
                        fill="black"/>
                    <path
                        d="M60 39C60 32.27 56.1 26.27 50 23.51V18C50 17.45 49.55 17 49 17H46.13C46.24 16.58 46.41 16.19 46.64 15.84C46.65 15.83 46.65 15.82 46.66 15.81C46.67 15.8 46.67 15.78 46.68 15.77C46.99 15.31 47.39 14.92 47.85 14.63C47.89 14.62 47.92 14.61 47.95 14.59C48.02 14.55 48.09 14.51 48.15 14.46C48.7 14.17 49.33 14 50 14H52C53.65 14 55 12.65 55 11C55 9.35 53.65 8 52 8H50C48.29 8 46.67 8.43 45.26 9.2C43.7 10.04 42.38 11.3 41.45 12.82V12.83C40.69 14.07 40.2 15.48 40.05 17H37C36.45 17 36 17.45 36 18V23.51C35.08 23.93 34.21 24.42 33.39 24.99L32.51 24.15L32.54 24.12C33.31 23.34 33.32 22.07 32.54 21.29L29.71 18.46C28.93 17.68 27.66 17.69 26.88 18.46L26.54 18.8L25 18.28V18C25 16.9 24.1 16 23 16H19C17.9 16 17 16.9 17 18V18.28L15.45 18.79L15.12 18.46C14.34 17.69 13.07 17.69 12.29 18.46L9.46 21.29C8.68 22.07 8.69 23.34 9.46 24.12L9.62 24.28L8.47 26H8C6.9 26 6 26.9 6 28V32C6 33.1 6.9 34 8 34V35.18C6.84 35.59 6 36.7 6 38V38.61L2.84 39.13C2.29 39.21 1.92 39.73 2.01 40.27C2.09 40.76 2.52 41.11 3 41.11C3.05 41.11 3.11 41.11 3.16 41.1L6 40.64V51.33L2.9 51.65C2.35 51.71 1.95 52.2 2.01 52.75C2.06 53.26 2.49 53.64 3 53.64C3.03 53.64 3.07 53.64 3.1 53.64L6 53.34V54C6 55.65 7.35 57 9 57C10.65 57 12 55.65 12 54V52.78C14.54 52.75 17.04 53.36 19.28 54.57L31.5 61.16C32.54 61.72 33.67 62 34.82 62C35.4 62 35.97 61.93 36.54 61.79L48.12 58.86C50.28 58.32 51.64 56.26 51.23 54.17C51.21 54.07 51.19 53.97 51.16 53.88C56.56 50.93 60 45.18 60 39ZM49 10.07V12.09C48.64 12.14 48.29 12.24 47.96 12.36L47.06 10.56C47.67 10.31 48.32 10.15 49 10.07ZM45.3 11.53L46.22 13.36C45.97 13.55 45.74 13.77 45.53 14.01L43.76 13C44.21 12.45 44.72 11.95 45.3 11.53ZM42.72 14.7L44.46 15.7C44.29 16.11 44.16 16.55 44.08 17H42.06C42.16 16.19 42.39 15.42 42.72 14.7ZM27.48 20.7L28.29 19.88L31.12 22.71L30.36 23.47L29.71 24.12L26.88 21.29L27.48 20.7ZM19 19V18H23V19V20H19V19ZM13.71 19.88L14.55 20.72L15.12 21.29L12.29 24.12L11.68 23.51L10.88 22.71L13.71 19.88ZM8 28H9H10V32H9H8V28ZM10 51.88V54C10 54.55 9.55 55 9 55C8.45 55 8 54.55 8 54V52.25V39.48V38C8 37.45 8.45 37 9 37C9.55 37 10 37.45 10 38V51.88ZM11.97 37.64C11.84 36.5 11.05 35.55 10 35.18V34C11.1 34 12 33.1 12 32V28C12 27.17 11.48 26.45 10.76 26.15L11.07 25.7C11.43 25.98 11.86 26.12 12.29 26.12C12.8 26.12 13.32 25.93 13.71 25.54L16.54 22.71C17.16 22.09 17.28 21.17 16.92 20.42L17.04 20.38C17.22 21.3 18.03 22 19 22H23C23.97 22 24.79 21.3 24.96 20.37L25.08 20.41C24.72 21.16 24.84 22.09 25.46 22.71L28.29 25.54C28.68 25.93 29.2 26.12 29.71 26.12C30.21 26.12 30.71 25.94 31.1 25.56L31.79 26.22C28.16 29.38 26 33.99 26 39C26 39.35 26.01 39.7 26.04 40.05C25.85 39.94 25.66 39.83 25.47 39.73C21.53 37.61 16.93 36.83 12.52 37.55L11.97 37.64ZM47.63 56.92L36.05 59.85C34.84 60.16 33.56 60 32.45 59.4L20.23 52.81C17.7 51.44 14.87 50.74 12 50.77V39.67L12.84 39.53C16.82 38.88 20.97 39.58 24.52 41.49C25.09 41.8 25.64 42.14 26.17 42.5C26.52 42.74 26.86 42.99 27.19 43.25L33.71 48.4C34.14 48.74 34.41 49.24 34.46 49.79C34.51 50.33 34.34 50.85 33.98 51.27C33.95 51.3 33.92 51.33 33.89 51.36C33.18 52.08 31.96 52.11 31.09 51.43L25.77 47.23C25.34 46.88 24.71 46.96 24.37 47.39C24.03 47.82 24.1 48.45 24.53 48.79L29.85 53C30.65 53.63 31.58 53.93 32.5 53.93C33.28 53.93 34.03 53.72 34.68 53.29L36.64 54.57C37.34 55.03 38.21 55.18 39.02 54.97L46.81 53C47.35 52.87 47.91 52.96 48.37 53.25C48.84 53.55 49.16 54.01 49.27 54.56C49.47 55.58 48.74 56.64 47.63 56.92ZM43.13 36C45.02 36.04 46.74 36.84 47.99 38.1C49.23 39.37 50 41.1 50 43C50 45.72 48.41 48.18 45.98 49.33C45.89 50.22 45.4 50.99 44.7 51.47L42.67 51.98C41.28 51.83 40.17 50.72 40.02 49.33C37.59 48.18 36 45.72 36 43C36 42.45 36.45 42 37 42H41C41.55 42 42 42.45 42 43C42 43.55 42.45 44 43 44C43.55 44 44 43.55 44 43C44 42.72 43.89 42.46 43.68 42.27C43.47 42.07 43.2 41.98 42.92 42C40.76 42.17 38.88 41.41 37.76 39.92C36.12 37.74 35.6 35.28 36.3 32.99C36.87 31.09 38.23 29.52 40.02 28.68C40.18 27.17 41.46 26 43 26C44.54 26 45.82 27.17 45.98 28.67C48.41 29.82 50 32.28 50 35C50 35.55 49.55 36 49 36H45C44.45 36 44 35.55 44 35C44 34.45 43.55 34 43 34C42.71 34 42.44 34.12 42.25 34.34C42.06 34.56 41.97 34.84 42.01 35.13C42.07 35.66 42.63 35.99 43.13 36Z"
                        fill="black"/>
                    <path
                        d="M54 5V3C54 2.45 53.55 2 53 2C52.45 2 52 2.45 52 3V5C52 5.55 52.45 6 53 6C53.55 6 54 5.55 54 5Z"
                        fill="black"/>
                    <path
                        d="M43 32C44.3 32 45.42 32.84 45.83 34H47.9C47.55 32.31 46.34 30.89 44.67 30.29C44.27 30.15 44 29.77 44 29.35V29C44 28.45 43.55 28 43 28C42.45 28 42 28.45 42 29V29.35C42 29.77 41.73 30.15 41.33 30.29C39.83 30.83 38.67 32.05 38.21 33.57C37.71 35.23 38.12 37.06 39.36 38.72C40.06 39.65 41.3 40.12 42.77 40.01C43.59 39.94 44.43 40.23 45.04 40.8C45.65 41.37 46 42.17 46 43C46 44.65 44.65 46 43 46C41.7 46 40.58 45.16 40.17 44H38.1C38.45 45.69 39.66 47.11 41.33 47.71C41.73 47.85 42 48.23 42 48.65V49C42 49.55 42.45 50 43 50C43.55 50 44 49.55 44 49V48.65C44 48.23 44.27 47.85 44.67 47.71C46.66 47 48 45.11 48 43C48 40.29 45.8 38.05 43.1 38C42.32 37.98 41.59 37.7 41.04 37.23C40.49 36.76 40.12 36.11 40.02 35.38C39.92 34.52 40.18 33.66 40.75 33.01C41.32 32.37 42.14 32 43 32Z"
                        fill="black"/>
                </svg>

                <div>
                    <p class="text-gray-800 text-lg font-semibold">
                        <span>{{$this->summary["hasDebt"]["count"]}}</span> |
                        <span>{{$this->summary["hasDebt"]["funds"]}}</span>
                    </p>
                    <p class="text-gray-600 text-sm">{{$this->summary["hasDebt"]["name"]}}</p>
                </div>
            </div>
            <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                    <g id="Layer_31" data-name="Layer 31">
                        <path
                            d="M53.5,36.65V18a1,1,0,0,0-.5-.87l-24.25-14a1,1,0,0,0-1,0L3.5,17.13A1,1,0,0,0,3,18V46a1,1,0,0,0,.5.87l24.25,14a1,1,0,0,0,1,0l9.11-5.26a12.74,12.74,0,1,0,15.64-19ZM28.25,5.15,50.5,18,39.34,24.44,18.68,10.68Zm0,25.7L6,18l10.75-6.21L37.4,25.56ZM5,19.73,27.25,32.58V58.27L5,45.42ZM29.25,58.27V32.58l9-5.23v7.79a1,1,0,0,0,2,0V26.2l11.2-6.47V35.94a12.44,12.44,0,0,0-3.25-.44A12.73,12.73,0,0,0,36.83,53.89Zm19,.73A10.75,10.75,0,1,1,59,48.25,10.76,10.76,0,0,1,48.25,59Z"/>
                        <path
                            d="M53.67,42.84a1,1,0,0,0-1.41,0l-4,4-4-4a1,1,0,1,0-1.41,1.41l4,4-4,4a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l4-4,4,4a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41l-4-4,4-4A1,1,0,0,0,53.67,42.84Z"/>
                    </g>
                </svg>
                <div>
                    <p class="text-gray-800 text-lg font-semibold">
                        <span>{{$this->summary["cancelled"]["count"]}}</span> |
                        <span>{{$this->summary["cancelled"]["funds"]}}</span>
                    </p>
                    <p class="text-gray-600 text-sm">{{$this->summary["cancelled"]["name"]}}</p>
                </div>
            </div>
            <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                     style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                     viewBox="0 0 1707 1707"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
 <defs>
     <style type="text/css">
         <
         !
         [CDATA[
         .fil0 {
             fill: black
         }

         ]
         ]
         >
     </style>
 </defs>
                    <g id="Layer_x0020_1">
                        <metadata id="CorelCorpID_0Corel-Layer"/>
                        <g id="_488288328">
                            <g>
                                <g>
                                    <path class="fil0"
                                          d="M754 1608l-124 0c-11,0 -20,-9 -23,-18l-38 -156c-26,-8 -51,-19 -76,-34l-127 80c-10,6 -23,4 -31,-3l-87 -87c-9,-8 -10,-21 -4,-29l83 -137c-13,-24 -22,-50 -29,-78l-147 -35c-11,-2 -20,-12 -20,-23l0 -124c0,-11 9,-21 18,-23l157 -38c10,-29 21,-54 35,-75l-81 -129c-5,-9 -4,-22 4,-30l88 -87c8,-9 21,-10 29,-5l137 84c26,-13 51,-23 78,-30l33 -147c3,-11 13,-19 24,-19l124 0c12,0 21,8 24,18l37 157c25,8 52,21 75,34l128 -80c10,-6 22,-4 30,3l88 87c8,8 10,21 4,31l-83 136c12,25 22,51 30,79l178 40c12,3 21,16 18,29 -3,12 -17,21 -29,18l-193 -44c-10,-2 -17,-10 -18,-18 -7,-34 -19,-64 -36,-93 -4,-9 -4,-17 0,-25l80 -132 -61 -61 -125 79c-8,6 -18,6 -26,0 -29,-18 -60,-32 -90,-42 -8,-2 -15,-9 -17,-18l-33 -148 -86 0 -33 143c-2,9 -10,16 -18,18 -31,7 -63,18 -93,34 -7,5 -17,5 -24,-1l-133 -80 -60 59 78 125c6,8 4,18 0,26 -16,25 -29,55 -41,91 -3,8 -10,13 -18,16l-150 36 0 86 144 34c10,1 17,9 18,18 8,34 19,66 35,93 4,8 4,16 0,24l-81 132 61 61 125 -79c8,-5 18,-5 26,0 30,18 60,32 91,42 8,3 15,10 16,18l36 150 85 0 33 -143c2,-10 10,-17 18,-18 35,-9 65,-20 92,-35 11,-7 26,-3 33,10 7,12 3,26 -10,33 -26,15 -57,28 -90,36l-33 147c-3,10 -13,17 -25,17z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M704 1351c-169,0 -307,-137 -307,-305 0,-168 138,-306 307,-306 169,0 305,137 305,306 0,169 -137,305 -305,305zm0 -563c-143,0 -258,115 -258,258 0,143 117,257 258,257 141,0 257,-115 257,-257 0,-141 -116,-258 -257,-258z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M704 1233c-103,0 -187,-83 -187,-187 0,-103 83,-187 187,-187 104,0 187,83 187,187 0,103 -84,187 -187,187zm0 -326c-76,0 -139,63 -139,139 0,76 63,139 139,139 76,0 139,-63 139,-139 0,-76 -63,-139 -139,-139z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M1202 1613c-135,0 -244,-109 -244,-242 0,-135 109,-244 244,-244 134,0 243,109 243,244 0,133 -109,242 -243,242zm0 -438c-108,0 -196,87 -196,196 0,106 88,194 196,194 107,0 194,-88 194,-194 0,-109 -87,-196 -194,-196z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M1270 1452c-6,0 -13,-2 -17,-6l-62 -63c-4,-4 -7,-11 -7,-17l0 -116c0,-14 11,-25 25,-25 14,0 25,11 25,25l0 105 55 56c10,10 10,25 0,35 -7,4 -14,6 -19,6z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M1202 1706c-186,0 -337,-151 -337,-335 0,-186 151,-337 337,-337 184,0 335,151 335,337 0,184 -151,335 -335,335zm0 -624c-160,0 -289,129 -289,289 0,158 129,287 289,287 158,0 287,-129 287,-287 0,-160 -129,-289 -287,-289z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M869 704c-14,0 -25,-12 -25,-25l0 -332 -53 0c-8,0 -16,-4 -20,-12 -5,-9 -5,-17 0,-25l173 -297c4,-7 12,-13 21,-13 8,0 16,5 21,13l173 298c4,7 4,17 0,25 -4,8 -13,13 -21,13l-53 0 0 274c0,14 -11,25 -25,25 -13,0 -25,-11 -25,-25l0 -301c0,-14 12,-25 25,-25l36 0 -131 -224 -131 224 35 0c14,0 25,11 25,25l0 357c0,13 -11,25 -25,25z"/>
                                </g>
                                <g>
                                    <path class="fil0"
                                          d="M1474 1242c-14,0 -25,-11 -25,-25l0 -680c0,-14 11,-25 25,-25l39 0 -135 -294 -135 294 39 0c14,0 25,11 25,25l0 530c0,14 -11,25 -25,25 -14,0 -25,-11 -25,-25l0 -505 -52 0c-9,0 -17,-4 -21,-11 -4,-7 -6,-15 -2,-24l174 -375c4,-9 12,-14 22,-14l0 0c10,0 18,5 22,14l174 375c2,7 2,17 -2,24 -4,7 -12,11 -21,11l-52 0 0 655c-2,14 -13,25 -25,25z"/>
                                </g>
                            </g>
                        </g>
                    </g>
</svg>

                <div>
                    <p class="text-gray-800 text-lg font-semibold">
                        <span>{{$this->summary["inProgress"]["count"]}}</span> |
                        <span>{{$this->summary["inProgress"]["funds"]}}</span>
                    </p>
                    <p class="text-gray-600 text-sm">{{$this->summary["inProgress"]["name"]}}</p>
                </div>
            </div>
            <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101 101">
                    <title>log_Artboard 2 copy 4</title>
                    <path
                        d="M88.38,32.29l-37-27a1.5,1.5,0,0,0-1.78,0l-36,27a1.5,1.5,0,0,0-.6,1.2v52A1.5,1.5,0,0,0,14.5,87h73A1.5,1.5,0,0,0,89,85.5v-52A1.5,1.5,0,0,0,88.38,32.29ZM75,65H59V50H75ZM56,84H41V68H56Zm3-16H75V84H59ZM75,47H57.5A1.5,1.5,0,0,0,56,48.5V65H39.5A1.5,1.5,0,0,0,38,66.5V84H28V40H75ZM86,84H78V38.5A1.5,1.5,0,0,0,76.5,37h-50A1.5,1.5,0,0,0,25,38.5V84H16V34.25L50.51,8.37,86,34.26Z"/>
                </svg>
                <div>
                    <p class="text-gray-800 text-lg font-semibold">
                        <span>{{$this->summary["completed"]["count"]}}</span> |
                        <span>{{$this->summary["completed"]["funds"]}}</span>
                    </p>
                    <p class="text-gray-600 text-sm">{{$this->summary["completed"]["name"]}}</p>
                </div>
            </div>
            <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                     y="0px"
                     viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
<style type="text/css">
    .st0 {
        fill: none;
        stroke: #000000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
    }

    .st1 {
        fill: none;
        stroke: #000000;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
        stroke-dasharray: 3;
    }

    .st2 {
        fill: none;
        stroke: #000000;
        stroke-width: 2;
        stroke-linejoin: round;
        stroke-miterlimit: 10;
    }

    .st3 {
        fill: none;
    }
</style>
                    <line class="st0" x1="21" y1="15" x2="21" y2="11"/>
                    <polyline class="st0" points="23,12.1 21,10 19,12.1 "/>
                    <path class="st0" d="M3,24l2.6-4.2c1.5-2.3,4-3.8,6.8-3.8H19v0c0,2.2-1.8,4-4,4h-2"/>
                    <path class="st0"
                          d="M15,20h8l1.2-1.6c1.1-1.5,2.9-2.4,4.8-2.4h0l-2.7,4.8c-1.4,2.6-4.2,4.2-7.1,4.2h0c-4.7,0-9.3,1.4-13.2,4l0,0"/>
                    <path class="st0" d="M26,16.8V5c0-0.6-0.4-1-1-1h-5v3h-4V4h-5c-0.6,0-1,0.4-1,1v11"/>
                    <line class="st0" x1="16" y1="4" x2="20" y2="4"/>
                    <rect x="-144" y="-504" class="st3" width="536" height="680"/>
</svg>
                <div>
                    <p class="text-gray-800 text-lg font-semibold">
                        <span>{{$this->summary["delivered"]["count"]}}</span> |
                        <span>{{$this->summary["delivered"]["funds"]}}</span>
                    </p>
                    <p class="text-gray-600 text-sm">{{$this->summary["delivered"]["name"]}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap gap-3">
            @foreach($this->timeSummary as $timeSummary)
                <div class="p-4 rounded-lg shadow-lg bg-white flex items-center gap-4">
                    <svg class="w-10 h-10 text-gray-500" viewBox="0 0 64 64">
                        <path
                            d="M54,11.19482H47.57129a4.00016,4.00016,0,0,0-8-.00577c.00625.00511-15.14873.00583-15.14258-.00007a4,4,0,1,0-8,.00584H10a6.00657,6.00657,0,0,0-6,6V50.80811a6.00657,6.00657,0,0,0,6,6H54a6.00657,6.00657,0,0,0,6-6V17.19482A6.00657,6.00657,0,0,0,54,11.19482Zm-44,2h6.42871a4.0015,4.0015,0,0,0,4,3.99707,1.00016,1.00016,0,0,0-.003-2,1.99917,1.99917,0,0,1-1.997-1.99708V11.189a2,2,0,0,1,4,.00293H20.95508a1.0002,1.0002,0,0,0,.00007,2H39.57129a4.00149,4.00149,0,0,0,3.99707,4,1.00016,1.00016,0,0,0-.00007-2,1.99916,1.99916,0,0,1-1.997-1.99708V11.189a2,2,0,0,1,4,.00586H44.09961a1.00018,1.00018,0,0,0,.00005,2H54a4.00428,4.00428,0,0,1,4,4v5.56836H6V17.19482A4.00428,4.00428,0,0,1,10,13.19482ZM54,54.80811H10a4.00428,4.00428,0,0,1-4-4V24.76318H58V50.80811A4.00428,4.00428,0,0,1,54,54.80811Z"></path>
                        <path
                            d="M48,27.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,48,27.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,48,31.78564Z"></path>
                        <path
                            d="M48,36.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,48,36.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,48,40.78564Z"></path>
                        <path
                            d="M48,45.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,48,45.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,48,49.78564Z"></path>
                        <path
                            d="M32,27.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,32,27.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,32,31.78564Z"></path>
                        <path
                            d="M32,36.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,32,36.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,32,40.78564Z"></path>
                        <path
                            d="M32,45.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,32,45.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,32,49.78564Z"></path>
                        <path
                            d="M16,27.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,16,27.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,16,31.78564Z"></path>
                        <path
                            d="M16,36.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,16,36.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,16,40.78564Z"></path>
                        <path
                            d="M16,45.78564a3.00019,3.00019,0,0,0,.00009,6A3.00019,3.00019,0,0,0,16,45.78564Zm0,4a1.00019,1.00019,0,0,1,.00006-2A1.00019,1.00019,0,0,1,16,49.78564Z"></path>
                    </svg>
                    <div>
                        <p class="text-gray-800 text-lg font-semibold">
                            <span>{{$timeSummary["count"]}}</span>
                        </p>
                        <p class="text-gray-600 text-sm">{{$timeSummary["name"]}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="my-container flex items-center gap-3">
            <p class="text-sm leading-none">Tapıldı : <strong class="font-bold"> {{$this->orders->total()}}
                    ədəd</strong></p>
            <select class="input" wire:model.live="orderBy">
                @foreach($sortings as $key=>$sorting)
                    <option value="{{$key}}">{{$sorting}}</option>
                @endforeach
            </select>

            <div x-transition x-show="!state" class="inline-flex items-center gap-3">
                <input type="text" class="input" placeholder="Sifariş kodu"
                       wire:model.live="filters.pid">
                <button wire:click="$toggle('searchState')" class="link link-primary">Ətraflı axtarış</button>
            </div>


            <div class="flex gap-3 ml-auto">
                <button wire:click="export"
                        class="btn btn-outline btn-outline-primary">

                    <svg class="size-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM155.7 250.2L192 302.1l36.3-51.9c7.6-10.9 22.6-13.5 33.4-5.9s13.5 22.6 5.9 33.4L221.3 344l46.4 66.2c7.6 10.9 5 25.8-5.9 33.4s-25.8 5-33.4-5.9L192 385.8l-36.3 51.9c-7.6 10.9-22.6 13.5-33.4 5.9s-13.5-22.6-5.9-33.4L162.7 344l-46.4-66.2c-7.6-10.9-5-25.8 5.9-33.4s25.8-5 33.4 5.9z"/>
                    </svg>

                    <span wire:loading wire:target="export"
                          class="animate-pulse font-light">Məlumat emal olunur...</span>
                    <span wire:loading.class="hidden" wire:target="export">
                        Excel faylı
                    </span>
                </button>
                <a href="{{url("order/create")}}"
                   class="btn btn-success">
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Yeni
                    sifariş</a>
            </div>
        </div>
        <div class="my-container grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="custom-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>Sifariş kodu</th>
                    <th>Status</th>
                    <th>Yekun</th>
                    <th>Ödənilib</th>
                    <th>Borc</th>
                    <th>Müştəri</th>
                    <th>İcraçı</th>
                    <th>Tarix</th>
                    </thead>
                    <tbody>
                    @forelse($this->orders as $order)
                        <tr>
                            <td>
                                <a href="{{url("order/details/$order->id")}}"
                                   class="btn btn-outline btn-outline-primary btn-small">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Ətraflı məlumat</span>
                                </a>
                            </td>
                            <td>{{$order->pid}}</td>
                            <td>{{$order->status->name}}</td>
                            <td>{{$order->total}} AZN</td>
                            <td>{{$order->paid}} AZN</td>
                            <td>{{$order->debt}} AZN</td>
                            <td>
                                <a href="{{url("user/details/$order->customer_id")}}" wire:navigate>
                                    {{$order->customer->name}}
                                </a>
                            </td>
                            <td>{{$order->executor->name}}</td>
                            <td>{{$order->created_at->format("d-m-Y h:i:s")}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <p class="font-bold p-8 text-slate-600 text-center text-3xl">Sifariş tapılmadı</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{$this->orders->links()}}
        </div>
    </div>
    <div x-show="state" x-transition
         class="w-80 grid gap-4 sticky top-4 p-4 bg-white shadow-[rgba(7,_65,_210,_0.1)_0px_9px_30px]"
         wire:keydown.enter="search" @click.outside="state = false">
        <div class="flex justify-between items-center gap-4 text-blue-700">
            <p class="font-bold text-3xl">Ətraflı axtarış</p>
            <button wire:click="$toggle('searchState')">
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
        </div>
        <hr class="border-2 border-zinc-100">
        <div class="grid gap-1">
            <div class="text-sm font-medium">Sifariş kodu</div>
            <input type="text" class="input" wire:model="filters.pid">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Məhsul tərkibi</div>
            <input type="text" class="input" wire:model="filters.receipt">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Müştəri</div>
            <input type="text" class="input" wire:model="filters.customer">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">İcraçı</div>
            <input type="text" class="input" placeholder="Sifariş kodu"
                   wire:model="filters.executor">
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Status</div>
            <div class="grid gap-2">
                @foreach(\App\Models\OrderStatus::orderBy("name","asc")->get() as $status)
                    <label for="order-status-{{$status->id}}" class="input cursor-pointer">
                        <input type="checkbox" id="order-status-{{$status->id}}" wire:model="filters.status"
                               value="{{$status->id}}">
                        <span>{{$status->name}}</span>
                    </label>
                @endforeach

            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Yekun məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.total.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.total.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Ödənilmiş məbləğ</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.paid.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.paid.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Borc</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.debt.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.debt.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Endirim</div>
            <div class="grid grid-cols-2 gap-2">
                <input type="text" class="input" placeholder="Min."
                       wire:model="filters.discount.min">
                <input type="text" class="input" placeholder="Maks."
                       wire:model="filters.discount.max">
            </div>
        </div>
        <div class="grid gap-1">
            <div class="text-sm font-medium">Tarix</div>
            <div class="grid grid-cols-2 gap-2">
                <div class="grid gap-1">
                    <input type="text" class="input w-full" placeholder="gün-ay-il"
                           wire:model="filters.createdAt.min" x-mask="99-99-9999">
                    <span class="text-sm">Tarixdən</span>
                </div>
                <div class="grid gap-1">
                    <input type="text" class="input w-full" placeholder="gün-ay-il"
                           wire:model="filters.createdAt.max" x-mask="99-99-9999">
                    <span class="text-sm">Tarixə</span>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-2">
            <button type="button" wire:click="search"
                    class="btn btn-outline btn-outline-primary inline-flex items-center gap-1.5">
                <svg class="size-5" viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <circle cx="10" cy="10" r="7"/>
                    <line x1="21" y1="21" x2="15" y2="15"/>
                </svg>
                Axtar
            </button>
            <button type="button" wire:click="search('true')"
                    class="btn btn-outline inline-flex items-center gap-1.5">
                <svg class="size-5"  viewBox="0 0 24 24" stroke-width="2"
                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5"/>
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5"/>
                </svg>
                Sıfırla
            </button>
        </div>
    </div>
</div>

