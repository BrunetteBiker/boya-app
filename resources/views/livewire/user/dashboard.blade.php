<div class="grid gap-4" x-data="{state : $wire.entangle('searchState')}">

    <div class="flex flex-wrap gap-3">
        <div class="p-4 rounded-lg shadow-lg bg-white flex items-center space-x-4">
            <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                <path
                    d="M50,51.693A11.746,11.746,0,1,0,38.254,39.948,11.759,11.759,0,0,0,50,51.693ZM50,31.2a8.746,8.746,0,1,1-8.746,8.746A8.756,8.756,0,0,1,50,31.2Z"/>
                <path
                    d="M75.581,41.349A11.746,11.746,0,1,0,63.835,29.6,11.759,11.759,0,0,0,75.581,41.349Zm0-20.492A8.746,8.746,0,1,1,66.835,29.6,8.757,8.757,0,0,1,75.581,20.857Z"/>
                <path
                    d="M5,71.984H29.307A21.106,21.106,0,0,0,29.081,75V80.83a1.5,1.5,0,0,0,1.5,1.5H69.419a1.5,1.5,0,0,0,1.5-1.5V75a21.106,21.106,0,0,0-.226-3.019H95a1.5,1.5,0,0,0,1.5-1.5V64.657a20.92,20.92,0,0,0-39.614-9.388,21.12,21.12,0,0,0-13.786.005A20.909,20.909,0,0,0,3.5,64.657v5.827A1.5,1.5,0,0,0,5,71.984ZM75.581,46.738A17.918,17.918,0,0,1,93.5,64.657v4.327H70.039c-.013-.043-.029-.085-.043-.128-.051-.166-.109-.328-.165-.493-.09-.269-.181-.537-.281-.8-.068-.177-.141-.35-.213-.525-.1-.248-.206-.494-.318-.737q-.121-.265-.251-.526-.174-.354-.362-.7c-.093-.172-.187-.344-.285-.513-.132-.228-.269-.453-.409-.676-.1-.164-.206-.328-.314-.489-.151-.227-.31-.448-.47-.669-.108-.148-.213-.3-.325-.444-.183-.239-.376-.471-.57-.7-.1-.119-.2-.242-.3-.359-.3-.344-.613-.68-.938-1-.432-.433-.884-.839-1.348-1.23-.147-.123-.3-.238-.45-.358-.329-.261-.663-.515-1.006-.756q-.267-.186-.539-.364c-.344-.226-.7-.439-1.054-.644-.175-.1-.348-.2-.527-.3-.075-.04-.146-.086-.221-.125A17.89,17.89,0,0,1,75.581,46.738ZM57.07,58.531A17.9,17.9,0,0,1,67.919,75V79.33H32.081V75a17.941,17.941,0,0,1,.488-4.171,17.731,17.731,0,0,1,1.44-3.916c.217-.427.457-.841.707-1.249a17.929,17.929,0,0,1,8.214-7.136h0A18.084,18.084,0,0,1,57.07,58.531ZM6.5,64.657a17.928,17.928,0,0,1,33.85-8.219c-.055.029-.105.065-.16.094-.558.3-1.1.614-1.63.959l-.031.019c-.529.349-1.037.727-1.531,1.121-.079.063-.159.124-.238.188q-.7.578-1.351,1.212l-.238.238c-.432.436-.849.886-1.242,1.357-.042.051-.081.1-.122.154q-.572.7-1.081,1.444c-.036.054-.076.105-.112.159-.341.509-.655,1.036-.951,1.574-.055.1-.11.2-.164.3-.282.533-.543,1.079-.778,1.637-.041.1-.079.195-.118.293-.237.584-.454,1.177-.637,1.784l-.005.013H6.5Z"/>
                <path
                    d="M24.419,41.349A11.746,11.746,0,1,0,12.673,29.6,11.759,11.759,0,0,0,24.419,41.349Zm0-20.492A8.746,8.746,0,1,1,15.673,29.6,8.757,8.757,0,0,1,24.419,20.857Z"/>
            </svg>
            <div>
                <p class="text-gray-800 text-lg font-semibold">
                    <span>{{$this->summary["all"]["count"]}}</span>
                </p>
                <p class="text-gray-600 text-sm">{{$this->summary["all"]["name"]}}</p>
            </div>
        </div>
        <div class="p-4 rounded-lg shadow-lg bg-white flex items-center space-x-4">
            <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                <path
                    d="M38.673,30.211c1.394-.888,2.327-2.438,2.327-4.211,0-2.757-2.243-5-5-5s-5,2.243-5,5c0,1.773,.935,3.325,2.331,4.213-1.43,.356-2.72,1.16-3.676,2.295-.814-.585-1.741-1.019-2.742-1.266,1.839-1.026,3.087-2.99,3.087-5.241,0-3.309-2.691-6-6-6s-6,2.691-6,6c0,2.251,1.248,4.215,3.087,5.241-1.002,.247-1.928,.681-2.742,1.266-.956-1.134-2.245-1.939-3.676-2.295,1.396-.888,2.331-2.439,2.331-4.213,0-2.757-2.243-5-5-5s-5,2.243-5,5c0,1.772,.933,3.322,2.327,4.211-3.053,.753-5.327,3.507-5.327,6.789v2c0,1.654,1.346,3,3,3H15c0,1.654,1.346,3,3,3h12c1.654,0,3-1.346,3-3h8c1.654,0,3-1.346,3-3v-2c0-3.282-2.274-6.037-5.327-6.789Zm-2.673-7.211c1.654,0,3,1.346,3,3s-1.346,3-3,3-3-1.346-3-3,1.346-3,3-3Zm-12-1c2.206,0,4,1.794,4,4s-1.794,4-4,4-4-1.794-4-4,1.794-4,4-4Zm-12,1c1.654,0,3,1.346,3,3s-1.346,3-3,3-3-1.346-3-3,1.346-3,3-3Zm-5,17c-.552,0-1-.449-1-1v-2c0-2.757,2.243-5,5-5h2c1.51,0,2.937,.7,3.878,1.861-1.17,1.391-1.878,3.183-1.878,5.139v1H7Zm24,2c0,.551-.448,1-1,1h-12c-.552,0-1-.449-1-1v-3c0-3.309,2.691-6,6-6h2c3.309,0,6,2.691,6,6v3Zm11-3c0,.551-.448,1-1,1h-8v-1c0-1.956-.708-3.748-1.878-5.139,.94-1.16,2.367-1.861,3.878-1.861h2c2.757,0,5,2.243,5,5v2Z"/>
                <path
                    d="M33.605,14.636l-.054,1.971c-.018,.64,.28,1.247,.798,1.623,.52,.376,1.189,.474,1.792,.259l1.858-.661,1.858,.661c.212,.075,.432,.112,.65,.112,.404,0,.805-.126,1.142-.371,.518-.376,.815-.983,.798-1.622l-.054-1.972,1.203-1.564c.391-.508,.505-1.174,.307-1.783-.198-.608-.683-1.08-1.296-1.26l-1.893-.558-1.115-1.627c-.361-.528-.96-.844-1.601-.844s-1.239,.315-1.601,.843l-1.115,1.627-1.892,.558c-.614,.181-1.099,.652-1.297,1.26-.198,.609-.084,1.275,.307,1.784l1.203,1.563Zm2.586-3.348c.221-.065,.411-.204,.542-.394l1.217-1.92,1.316,1.92c.131,.189,.321,.329,.542,.394l2.203,.565-1.42,1.845c-.14,.182-.213,.407-.207,.637l.144,2.27-2.193-.78c-.217-.077-.453-.077-.67,0l-2.113,.838,.063-2.328c.006-.23-.067-.455-.207-.637l-1.45-1.751,2.233-.659Z"/>
                <path
                    d="M5.605,14.636l-.054,1.971c-.018,.64,.28,1.247,.798,1.623,.52,.376,1.188,.474,1.792,.259l1.858-.661,1.858,.661c.212,.075,.432,.112,.65,.112,.404,0,.805-.126,1.142-.371,.518-.376,.815-.983,.798-1.622l-.054-1.972,1.203-1.564c.391-.508,.505-1.174,.307-1.783-.198-.608-.683-1.08-1.296-1.26l-1.893-.558-1.115-1.627c-.361-.528-.96-.844-1.601-.844s-1.239,.315-1.601,.843l-1.115,1.627-1.892,.558c-.614,.181-1.099,.652-1.297,1.26-.198,.609-.084,1.275,.307,1.784l1.203,1.563Zm2.586-3.348c.221-.065,.411-.204,.542-.394l1.217-1.92,1.316,1.92c.131,.189,.321,.329,.542,.394l2.203,.565-1.42,1.845c-.14,.182-.213,.407-.207,.637l.144,2.27-2.193-.78c-.217-.077-.453-.077-.67,0l-2.113,.838,.063-2.328c.006-.23-.067-.455-.207-.637l-1.45-1.751,2.233-.659Z"/>
                <path
                    d="M18.929,11.898l-.067,2.438c-.019,.702,.31,1.367,.877,1.78,.369,.268,.808,.406,1.251,.406,.239,0,.48-.041,.713-.123l2.298-.817,2.298,.817c.662,.234,1.395,.128,1.964-.283,.567-.413,.896-1.078,.877-1.781l-.067-2.437,1.487-1.933c.428-.557,.554-1.288,.337-1.956s-.749-1.185-1.423-1.384l-2.339-.69-1.378-2.011c-.397-.579-1.054-.925-1.756-.925s-1.358,.346-1.756,.925l-1.378,2.011-2.34,.69c-.673,.199-1.205,.716-1.422,1.384s-.091,1.399,.337,1.956l1.487,1.933Zm.078-3.27c.021-.065,.069-.079,.085-.084l2.681-.79c.221-.065,.413-.204,.543-.394l1.579-2.305c.009-.014,.038-.056,.105-.056s.097,.042,.105,.056l1.579,2.305c.13,.189,.322,.329,.543,.394l2.68,.79c.017,.005,.065,.019,.086,.084,.021,.064-.01,.104-.021,.118l-1.704,2.214c-.14,.182-.213,.408-.207,.638l.077,2.792c0,.017,.002,.067-.053,.107-.055,.039-.103,.022-.118,.017l-2.633-.936c-.217-.077-.453-.077-.67,0l-2.633,.936c-.016,.006-.063,.022-.118-.017-.055-.04-.054-.091-.053-.107l.077-2.793c.006-.23-.067-.456-.207-.638l-1.704-2.214c-.011-.013-.041-.053-.021-.118Z"/>
            </svg>
            <div>
                <p class="text-gray-800 text-lg font-semibold">
                    <span>{{$this->summary["customers"]["count"]}}</span>
                </p>
                <p class="text-gray-600 text-sm">{{$this->summary["customers"]["name"]}}</p>
            </div>
        </div>
        <div class="p-4 rounded-lg shadow-lg bg-white flex items-center space-x-4">
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
             fill: url(#id0)
         }

         ]
         ]
         >
     </style>
     <linearGradient id="id0" gradientUnits="userSpaceOnUse" x1="0.15748" y1="853.331" x2="1706.5" y2="853.331">
         <stop offset="0" style="stop-opacity:1; stop-color:#336666"/>
         <stop offset="1" style="stop-opacity:1; stop-color:#003333"/>
     </linearGradient>
 </defs>
                <g id="Layer_x0020_1">
                    <metadata id="CorelCorpID_0Corel-Layer"/>
                    <path class="fil0"
                          d="M118 1047l0 -131c0,-30 46,-30 46,0l0 131 237 0 0 -131c0,-30 46,-30 46,0l0 131 72 0 0 -106c0,-55 -50,-100 -114,-106 -50,90 -200,90 -251,1 -61,8 -108,53 -108,105l0 106 72 0zm785 -372l-99 0c-12,0 -21,-9 -23,-20l-9 -78c-19,-8 -37,-18 -54,-31l-72 31c-10,4 -22,0 -28,-10l-50 -86c-6,-10 -3,-22 6,-29l63 -47c-3,-20 -3,-42 0,-62l-63 -47c-9,-7 -12,-19 -6,-29l50 -86c6,-10 18,-14 28,-10l72 31c17,-13 35,-23 54,-31l9 -78c2,-11 11,-20 23,-20l99 0c11,0 21,9 22,20l9 78c20,8 38,18 55,31l71 -31c11,-4 23,0 29,10l49 86c6,10 4,22 -6,29l-62 47c3,20 3,42 0,62l62 47c10,7 12,19 6,29l-49 86c-6,10 -18,14 -29,10l-71 -31c-17,13 -35,23 -54,31l-10 78c-1,11 -11,20 -22,20zm-79 -46l59 0 8 -71c3,-25 38,-18 78,-55 7,-6 17,-8 25,-4l66 28 29 -51c-89,-66 -62,-35 -62,-102 0,-67 -27,-36 62,-102l-29 -51 -66 28c-23,10 -35,-23 -87,-40 -9,-3 -15,-10 -16,-19l-8 -71 -59 0 -8 71c-3,25 -38,19 -79,55 -6,6 -16,8 -24,4l-66 -28 -29 51c89,66 62,35 62,102 0,67 27,36 -62,102l29 51 66 -28c23,-10 35,23 87,40 9,3 15,10 16,19l8 71zm29 -125c-71,0 -129,-58 -129,-130 0,-71 58,-130 129,-130 72,0 130,59 130,130 0,72 -58,130 -130,130zm0 -214c-46,0 -84,38 -84,84 0,46 38,84 84,84 47,0 85,-38 85,-84 0,-46 -38,-84 -85,-84zm318 1343l-635 0c-12,0 -23,-10 -23,-22l0 -158c0,-93 81,-170 187,-180l33 -57c-67,-65 -45,-133 -50,-168 -15,-50 -19,-152 66,-209 76,-51 167,-32 215,4 86,65 73,161 52,207 -5,26 19,99 -49,166l33 57c108,6 193,85 193,180l0 158c0,12 -10,22 -22,22zm-432 -336c41,79 180,79 222,-1l-31 -52c-48,27 -112,27 -161,0l-30 53zm-180 291l99 0 0 -166c0,-29 45,-29 45,0l0 166 301 0 0 -166c0,-29 45,-29 45,0l0 166 99 0 0 -135c0,-70 -65,-128 -147,-135 -59,110 -242,111 -302,1 -78,9 -140,67 -140,134l0 135 0 0zm363 -393c1,-1 3,-2 4,-3 47,-34 47,-93 45,-146 -5,-68 -23,-102 -55,-102 -51,0 -66,46 -93,32 -101,-54 -94,69 -94,122 0,100 114,156 193,97zm-148 -3c1,1 2,2 3,3m73 -342c-50,0 -103,34 -120,79 29,-22 67,-18 102,-3 34,-24 97,-49 140,-9 -17,-32 -57,-67 -122,-67zm-308 240l-519 0c-13,0 -23,-11 -23,-23l0 -129c0,-78 67,-142 154,-151l25 -42c-53,-55 -35,-105 -40,-138 -12,-42 -15,-127 56,-175 63,-42 140,-26 180,4 73,54 62,134 45,173 -5,24 15,80 -40,136l25 42c89,6 160,72 160,151l0 129c0,12 -11,23 -23,23zm-349 -280c34,60 139,60 173,0l-22 -38c-39,21 -90,21 -129,0l-22 38zm143 -86c42,-38 40,-66 39,-119 -3,-36 -12,-79 -41,-79 -35,0 -55,38 -78,25 -79,-41 -72,56 -72,96 0,78 91,122 152,77zm1348 366l-519 0c-13,0 -23,-11 -23,-23l0 -129c0,-78 67,-142 154,-151l24 -42c-53,-55 -34,-105 -39,-138 -12,-42 -15,-127 56,-175 63,-42 140,-26 180,4 72,54 62,134 45,173 -5,24 15,80 -40,136l24 42c90,6 161,72 161,151l0 129c-1,12 -11,23 -23,23zm-349 -280c34,60 139,60 173,0l-22 -38c-39,21 -90,21 -129,0l-22 38zm-148 234l73 0 0 -131c0,-30 46,-30 46,0l0 131 237 0 0 -131c0,-30 45,-30 45,0l0 131 73 0 0 -106c0,-55 -50,-100 -114,-106 -51,90 -200,90 -251,1 -61,8 -109,53 -109,105l0 106zm291 -320c41,-37 40,-67 38,-119 -2,-36 -11,-79 -40,-79 -35,0 -55,38 -78,25 -79,-41 -72,56 -72,96 0,78 91,123 152,77zm-115 -229c13,0 28,3 43,10 20,-13 60,-36 99,-19 -39,-43 -134,-53 -172,15 8,-4 18,-6 30,-6zm-1142 0c13,0 28,3 43,10 20,-13 60,-36 99,-19 -39,-43 -134,-53 -172,15 9,-4 18,-6 30,-6z"/>
                </g>
</svg>
            <div>
                <p class="text-gray-800 text-lg font-semibold">
                    <span>{{$this->summary["suppliers"]["count"]}}</span>
                </p>
                <p class="text-gray-600 text-sm">{{$this->summary["suppliers"]["name"]}}</p>
            </div>
        </div>
        <div class="p-4 rounded-lg shadow-lg bg-white flex items-center space-x-4">
            <svg class="w-10 h-10 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                 y="0px"
                 viewBox="0 0 336.4195 249.3379" enable-background="new 0 0 336.4195 249.3379" xml:space="preserve">
<g>
    <path d="M67.2793,172.3975c0.7844,2.1196,2.6591,3.7324,4.9827,4.108v-7.1534C70.8751,170.8007,69.1628,171.8315,67.2793,172.3975z
		"/>
    <path d="M21.4803,100.2207c-2.3267,0.5223-5.3477,1.7751-8.4174,4.6594C2.7285,114.5903-1.5072,136.6848,0.474,170.5505
		c0.1996,3.4083,3.0255,6.0385,6.3954,6.0381c0.126,0,0.2536-0.0035,0.3804-0.0109c3.5359-0.2067,6.2342-3.2408,6.0275-6.7763
		c-1.6371-27.9803,1.5019-42.9781,5.0561-50.4811C19.8103,113.0305,20.86,105.4679,21.4803,100.2207z"/>
    <path d="M18.4044,165.2238v74.2039c0,5.4749,4.4384,9.9102,9.9103,9.9102c5.4731,0,9.9116-4.4353,9.9116-9.9102v-72.2656
		C28.151,167.0311,21.4324,165.8792,18.4044,165.2238z"/>
    <path d="M53.6264,166.4869c-3.1722,0.3438-7.0775,0.6152-11.6848,0.6752v72.2656c0,5.4749,4.4382,9.9102,9.9102,9.9102
		c5.4731,0,9.9116-4.4353,9.9116-9.9102v-66.7379C58.1992,172.0049,55.2054,169.6669,53.6264,166.4869z"/>
    <path d="M22.0476,77.2519c0,9.9611,8.0754,18.0356,18.0356,18.0356c9.9619,0,18.0356-8.0746,18.0356-18.0356
		c0-0.8243-0.0746-1.6295-0.1816-2.4245H22.2293C22.1222,75.6224,22.0476,76.4276,22.0476,77.2519z"/>
    <path d="M21.4962,73.0638h0.3224h37.0826h0.321c1.337,0,2.4188-1.0818,2.4188-2.4189c0-1.3354-1.0818-2.4196-2.4188-2.4196H58.889
		c-0.1586-6.1611-3.3234-11.572-8.0803-14.8265v1.4759c0,1.0568-0.8563,1.9147-1.9131,1.9147c-1.0568,0-1.9147-0.858-1.9147-1.9147
		v-3.4823c-1.4873-0.5693-3.0646-0.9559-4.7078-1.1245v4.6068c0,1.0568-0.8564,1.9147-1.9131,1.9147
		c-1.0583,0-1.9147-0.858-1.9147-1.9147v-4.6066c-1.6432,0.1686-3.2205,0.5555-4.7077,1.1249v3.4817
		c0,1.0568-0.8564,1.9147-1.9148,1.9147c-1.0568,0-1.9131-0.858-1.9131-1.9147v-1.4748c-4.756,3.2547-7.9202,8.665-8.0788,14.8254
		h-0.3347c-1.3354,0-2.4173,1.0842-2.4173,2.4196C19.0789,71.9819,20.1607,73.0638,21.4962,73.0638z"/>
    <path d="M41.2857,159.6823c3.5709-0.0295,7.4545-0.1835,11.0109-0.3732c-0.1746-3.4478-0.2901-6.7788-0.3483-9.9982
		c-3.4633,0.1871-7.2389,0.3404-10.6626,0.3709v-5.7631c3.4411-0.0284,7.1716-0.1727,10.6208-0.353
		c0.0144-3.4885,0.1042-6.8312,0.2687-10.0314c-3.5261,0.1928-7.3922,0.3525-10.8895,0.3838v-17.3954l5.9573-16.6676H32.9233
		l5.9576,16.6675v17.3955c-9.7063-0.0867-22.2821-1.1667-22.4133-1.1779l-0.8633,9.9629c0.553,0.0479,13.1744,1.1321,23.2766,1.2156
		v5.7631c-9.7063-0.0866-22.2821-1.1662-22.4133-1.1774l-0.8633,9.9629c0.553,0.0479,13.1752,1.1317,23.2766,1.2151v9.5016h2.4047
		V159.6823z"/>
    <path d="M76.6945,155.8992v82.0558c0,6.0542,4.9081,10.9588,10.959,10.9588c6.0522,0,10.9603-4.9046,10.9603-10.9588v-79.9124
		C87.4726,157.8978,80.0429,156.6239,76.6945,155.8992z"/>
    <path d="M130.3216,161.8519c0.1973,2.9727,2.2408,5.4822,5.05,6.3153v-9.5793
		C133.9472,160.0756,132.2224,161.1835,130.3216,161.8519z"/>
    <path d="M115.536,157.3073c-3.4887,0.3748-7.77,0.6696-12.8136,0.7352v79.9125c0,6.0542,4.9079,10.9588,10.9589,10.9588
		c6.0522,0,10.9603-4.9046,10.9603-10.9588v-75.4379C120.927,162.1342,117.6588,160.1768,115.536,157.3073z"/>
    <path d="M56.8669,161.7896c0.2207,3.7689,3.3456,6.6774,7.0721,6.677c0.1394,0,0.2805-0.0039,0.4207-0.0121
		c3.91-0.2286,6.8939-3.5837,6.6653-7.4933c-1.8103-30.9409,1.6607-47.5258,5.5911-55.8227
		c1.6331-6.9553,2.7938-15.3181,3.4798-21.1205c-2.5729,0.5776-5.9136,1.9629-9.308,5.1524
		C59.3599,99.908,54.676,124.3403,56.8669,161.7896z"/>
    <path d="M80.7232,58.6186c0,11.0151,8.9299,19.9441,19.9441,19.9441c11.0161,0,19.944-8.929,19.944-19.9441
		c0-0.9116-0.0825-1.8019-0.2009-2.681H80.9242C80.8058,56.8167,80.7232,57.707,80.7232,58.6186z"/>
    <path d="M80.1135,53.9873h0.3566h41.0065h0.3549c1.4785,0,2.6748-1.1963,2.6748-2.6748c0-1.4767-1.1963-2.6757-2.6748-2.6757
		h-0.3685c-0.1754-6.813-3.675-12.7964-8.9353-16.3953v1.6321c0,1.1686-0.9469,2.1173-2.1156,2.1173
		c-1.1685,0-2.1172-0.9487-2.1172-2.1173v-3.8508c-1.6447-0.6295-3.3889-1.0571-5.2059-1.2435v5.0942
		c0,1.1686-0.9471,2.1173-2.1156,2.1173c-1.1703,0-2.1173-0.9487-2.1173-2.1173v-5.0941c-1.817,0.1865-3.5613,0.6143-5.2059,1.244
		v3.8501c0,1.1686-0.947,2.1173-2.1174,2.1173c-1.1686,0-2.1155-0.9487-2.1155-2.1173v-1.6309
		c-5.2592,3.5991-8.7583,9.5818-8.9337,16.3941h-0.3701c-1.4767,0-2.673,1.1989-2.673,2.6757
		C77.4405,52.791,78.6367,53.9873,80.1135,53.9873z"/>
    <path d="M101.997,149.2422c3.5372-0.0293,7.3536-0.1692,10.9376-0.3492c-0.188-3.4285-0.3286-6.7628-0.4164-9.9944
		c-3.4709,0.1758-7.1498,0.3131-10.5212,0.3431v-7.4312c3.364-0.0278,6.9786-0.156,10.4077-0.3233
		c-0.0104-3.4651,0.0446-6.8033,0.1617-10.0226c-3.4849,0.1769-7.1824,0.3153-10.5694,0.3455v-19.7654l6.5877-18.4312h-15.835
		l6.588,18.4312v19.7654c-10.7572-0.0958-24.6858-1.2916-24.8311-1.3043l-0.8633,9.9629
		c0.6103,0.0526,14.5453,1.2495,25.6944,1.3419v7.4312c-10.7572-0.0958-24.6858-1.2916-24.8311-1.3043l-0.8633,9.9629
		c0.6103,0.0526,14.5453,1.2495,25.6944,1.3419v11.0362h2.6592V149.2422z"/>
    <path d="M323.3565,104.8801c-3.0697-2.8844-6.0907-4.137-8.4175-4.6594c0.6204,5.2473,1.6702,12.8098,3.147,19.0995
		c3.5542,7.503,6.6931,22.5008,5.056,50.4811c-0.2067,3.5355,2.4916,6.5696,6.0275,6.7763c0.127,0.0074,0.2544,0.0109,0.3805,0.0109
		c3.37,0.0004,6.1959-2.6298,6.3954-6.0381C337.9267,136.6848,333.691,114.5903,323.3565,104.8801z"/>
    <path d="M298.1931,167.1621v72.2656c0,5.4749,4.4385,9.9102,9.9116,9.9102c5.472,0,9.9104-4.4353,9.9104-9.9102v-74.2039
		C314.9872,165.8792,308.2686,167.0311,298.1931,167.1621z"/>
    <path d="M282.7931,166.4869c-1.5789,3.18-4.5728,5.518-8.137,6.2029v66.7379c0,5.4749,4.4385,9.9102,9.9116,9.9102
		c5.4719,0,9.9102-4.4353,9.9102-9.9102v-72.2656C289.8705,167.1022,285.9653,166.8307,282.7931,166.4869z"/>
    <path d="M264.1574,169.3521v7.1534c2.3237-0.3756,4.1983-1.9885,4.9827-4.1081
		C267.2567,171.8314,265.5444,170.8007,264.1574,169.3521z"/>
    <path d="M278.3006,77.2519c0,9.9611,8.0737,18.0356,18.0356,18.0356c9.9602,0,18.0356-8.0746,18.0356-18.0356
		c0-0.8243-0.0746-1.6295-0.1816-2.4245h-35.708C278.3752,75.6224,278.3006,76.4276,278.3006,77.2519z"/>
    <path d="M277.1972,73.0638h0.321h37.0827h0.3224c1.3354,0,2.4172-1.0818,2.4172-2.4189c0-1.3354-1.0818-2.4196-2.4172-2.4196
		h-0.3347c-0.1586-6.1604-3.3229-11.5707-8.0788-14.8254v1.4748c0,1.0568-0.8563,1.9147-1.9131,1.9147
		c-1.0583,0-1.9148-0.858-1.9148-1.9147V51.393c-1.4872-0.5694-3.0645-0.9563-4.7077-1.1249v4.6066
		c0,1.0568-0.8564,1.9147-1.9147,1.9147c-1.0568,0-1.9132-0.858-1.9132-1.9147v-4.6068c-1.6431,0.1685-3.2205,0.5552-4.7078,1.1245
		v3.4823c0,1.0568-0.8579,1.9147-1.9147,1.9147c-1.0568,0-1.9131-0.858-1.9131-1.9147v-1.4759
		c-4.7568,3.2545-7.9217,8.6654-8.0803,14.8265h-0.3333c-1.337,0-2.4188,1.0842-2.4188,2.4196
		C274.7784,71.9819,275.8603,73.0638,277.1972,73.0638z"/>
    <path d="M319.952,132.7402c-0.1312,0.0112-12.7064,1.0912-22.4135,1.1779v-17.3955l5.9576-16.6675h-14.3197l5.9573,16.6676v17.3954
		c-3.4971-0.0313-7.3633-0.191-10.8895-0.3838c0.1645,3.2002,0.2543,6.5429,0.2687,10.0314
		c3.4493,0.1802,7.1797,0.3245,10.6208,0.353v5.7631c-3.4219-0.0305-7.1981-0.184-10.6626-0.3712
		c-0.0582,3.2195-0.1737,6.5506-0.3483,9.9985c3.5565,0.1896,7.4402,0.3438,11.0109,0.3732v9.5016h2.4047v-9.5016
		c10.1022-0.0835,22.7238-1.1672,23.2767-1.2151l-0.8633-9.9629c-0.1312,0.0112-12.6983,1.0908-22.4135,1.1774v-5.7631
		c10.1029-0.0835,22.7238-1.1677,23.2767-1.2156L319.952,132.7402z"/>
    <path d="M199.4634,158.5859v9.8662c3.4525-0.2122,6.1737-2.8627,6.5949-6.1759
		C203.5483,161.7297,201.2637,160.4669,199.4634,158.5859z"/>
    <path d="M265.3944,160.9611c-0.2285,3.9096,2.7553,7.2648,6.6653,7.4933c0.1403,0.0082,0.2813,0.0121,0.4207,0.0121
		c3.7265,0.0004,6.8514-2.9081,7.0721-6.677c2.1909-37.4492-2.493-61.8816-13.921-72.6193
		c-3.3945-3.1895-6.7351-4.5748-9.3081-5.1524c0.686,5.8025,1.8468,14.1653,3.4799,21.1205
		C263.7336,113.4354,267.2047,130.0202,265.3944,160.9611z"/>
    <path d="M219.4199,157.1415c-1.8169,2.5379-4.5212,4.3796-7.642,5.1017v75.7119c0,6.0542,4.9081,10.9588,10.9603,10.9588
		c6.051,0,10.9589-4.9046,10.9589-10.9588v-79.9125C227.9248,157.9675,223.149,157.5918,219.4199,157.1415z"/>
    <path d="M259.7249,155.8992c-3.3484,0.7247-10.778,1.9985-21.9194,2.1434v79.9124c0,6.0542,4.9081,10.9588,10.9604,10.9588
		c6.051,0,10.959-4.9046,10.959-10.9588V155.8992z"/>
    <path d="M215.8081,58.6186c0,11.0151,8.928,19.9441,19.9441,19.9441c11.0142,0,19.9441-8.929,19.9441-19.9441
		c0-0.9116-0.0825-1.8019-0.2009-2.681H216.009C215.8906,56.8167,215.8081,57.707,215.8081,58.6186z"/>
    <path d="M214.588,53.9873h0.3549h41.0065h0.3566c1.4768,0,2.6731-1.1963,2.6731-2.6748c0-1.4767-1.1963-2.6757-2.6731-2.6757
		h-0.3701c-0.1754-6.8123-3.6744-12.795-8.9337-16.3941v1.6309c0,1.1686-0.947,2.1173-2.1155,2.1173
		c-1.1703,0-2.1174-0.9487-2.1174-2.1173v-3.8501c-1.6445-0.6296-3.3888-1.0575-5.2058-1.244v5.0941
		c0,1.1686-0.947,2.1173-2.1173,2.1173c-1.1686,0-2.1156-0.9487-2.1156-2.1173v-5.0942c-1.817,0.1863-3.5613,0.614-5.2059,1.2435
		v3.8508c0,1.1686-0.9487,2.1173-2.1173,2.1173c-1.1686,0-2.1155-0.9487-2.1155-2.1173v-1.6321
		c-5.2603,3.5989-8.7599,9.5823-8.9353,16.3953h-0.3685c-1.4785,0-2.6748,1.1989-2.6748,2.6757
		C211.9132,52.791,213.1095,53.9873,214.588,53.9873z"/>
    <path d="M237.0816,149.2422c11.1491-0.0923,25.0843-1.2893,25.6946-1.3419l-0.8633-9.9629
		c-0.1453,0.0126-14.0667,1.2085-24.8313,1.3043v-7.4312c11.1491-0.0923,25.0843-1.2893,25.6946-1.3419l-0.8633-9.9629
		c-0.1453,0.0126-14.0667,1.2085-24.8313,1.3043v-19.7652l6.588-18.4313h-15.8349l6.5877,18.4312v19.7654
		c-3.9052-0.0348-8.2245-0.2142-12.1549-0.4297c0.1183,3.2205,0.1747,6.5599,0.1652,10.0267
		c3.881,0.2054,8.1038,0.3713,11.9897,0.4035v7.4312c-3.8873-0.0346-8.1851-0.2125-12.1011-0.4268
		c-0.0871,3.2314-0.2272,6.5668-0.4146,9.9952c4.0236,0.2183,8.4529,0.3984,12.5157,0.432v11.0362h2.6592V149.2422z"/>
    <path d="M200.8609,149.1216c-0.2578,4.4106,3.1084,8.1958,7.5195,8.4536c0.1592,0.0093,0.3164,0.0137,0.4746,0.0137
		c4.2041,0,7.7295-3.2813,7.9785-7.5327c2.4717-42.2476-2.8125-69.811-15.7051-81.9248c-3.8309-3.6-7.6008-5.1627-10.504-5.8143
		c0.7736,6.5437,2.0825,15.9738,3.9238,23.819C198.9844,95.4933,202.9035,114.2044,200.8609,149.1216z"/>
    <path d="M140.3721,143.413v92.5696c0,6.8301,5.5371,12.3633,12.3635,12.3633c6.8279,0,12.365-5.5332,12.365-12.3633v-90.1478
		C152.548,145.6729,144.1628,144.2318,140.3721,143.413z"/>
    <path d="M118.0034,150.0562c0.249,4.252,3.7744,7.5332,7.9785,7.5327c0.1572,0,0.3164-0.0044,0.4746-0.0137
		c4.4111-0.2578,7.7773-4.043,7.5195-8.4536c-2.0423-34.9064,1.8737-53.6166,6.3077-62.9768
		c1.8423-7.8466,3.1518-17.281,3.9257-23.8271c-2.9027,0.6517-6.6714,2.2144-10.501,5.8127
		C120.8159,80.2441,115.5318,107.8076,118.0034,150.0562z"/>
    <path d="M194.4639,143.4125c-3.7896,0.8187-12.1747,2.2603-24.7283,2.4222v90.1478c0,6.8301,5.5369,12.3633,12.3633,12.3633
		c6.8279,0,12.365-5.5332,12.365-12.3633V143.4125z"/>
    <path d="M144.9171,33.6633c0,12.4267,10.0743,22.5,22.5,22.5c12.4278,0,22.5-10.0733,22.5-22.5
		c0-1.0264-0.0751-2.0347-0.2081-3.0247h-44.5837C144.9922,31.6286,144.9171,32.637,144.9171,33.6633z"/>
    <path d="M144.2293,28.4385h0.4023h46.2617h0.4005c1.668,0,3.0176-1.3496,3.0176-3.0176c0-1.666-1.3496-3.0186-3.0176-3.0186
		h-0.4157c-0.1978-7.6862-4.1461-14.4364-10.0804-18.4965v1.8412c0,1.3184-1.0683,2.3887-2.3867,2.3887
		c-1.3183,0-2.3886-1.0703-2.3886-2.3887V1.4028C174.1668,0.6926,172.199,0.2102,170.1491,0v5.7471
		c0,1.3184-1.0684,2.3887-2.3867,2.3887c-1.3203,0-2.3887-1.0703-2.3887-2.3887V0.0002c-2.0499,0.2103-4.0176,0.693-5.873,1.4033
		v4.3435c0,1.3184-1.0684,2.3887-2.3887,2.3887c-1.3184,0-2.3867-1.0703-2.3867-2.3887V3.9072
		c-5.9332,4.0603-9.8807,10.8098-10.0786,18.4951h-0.4175c-1.666,0-3.0156,1.3525-3.0156,3.0186
		C141.2137,27.0889,142.5633,28.4385,144.2293,28.4385z"/>
    <path d="M168.9173,135.2605c12.5505-0.1042,28.2431-1.4518,28.9312-1.5115l-0.8633-9.9629
		c-0.1641,0.0145-15.9049,1.3658-28.0679,1.4738v-9.6655c12.5505-0.1042,28.2431-1.4518,28.9312-1.5115l-0.8633-9.9629
		c-0.1641,0.0145-15.9049,1.3658-28.0679,1.4738V82.6547l7.4319-20.7932H158.485l7.4323,20.7934v22.939
		c-12.1631-0.1079-27.9047-1.4593-28.0688-1.4738l-0.8633,9.9629c0.6882,0.0596,16.3815,1.4074,28.9321,1.5115v9.6654
		c-12.1631-0.1079-27.9047-1.4593-28.0688-1.4738l-0.8633,9.9629c0.6882,0.0596,16.3815,1.4074,28.9321,1.5115v13.0909h3V135.2605z"
    />
</g>
</svg>
            <div>
                <p class="text-gray-800 text-lg font-semibold">
                    <span>{{$this->summary["employees"]["count"]}}</span>
                </p>
                <p class="text-gray-600 text-sm">{{$this->summary["employees"]["name"]}}</p>
            </div>
        </div>

    </div>

    <div class="my-container flex gap-4">
        <select class="input" wire:model.live="currentSorting">
            @foreach($sortings as $key=>$sorting)
                <option value="{{$key}}">{{$sorting}}</option>
            @endforeach
        </select>
        <div x-show="!state" x-transition class="flex gap-2">
            <input type="text" class="input" placeholder="Axtarış" wire:model.live="searchKeyword">
            <button wire:click="$toggle('searchState')" class="link link-primary link-small">
                Ətraflı axtarış
            </button>
        </div>
        <button wire:click="$dispatch('create-user')"
                class="btn btn-outline btn-outline-success ml-auto">
            <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                <path d="M16 11h6m-3 -3v6"/>
            </svg>
            Yeni istifadəçi
        </button>
    </div>
    <div class="flex gap-4 items-start">
        <div class="my-container flex-1 grid gap-4">
            <div class="overflow-auto whitespace-nowrap">
                <table class="custom-table">
                    <thead>
                    <th>Əməliyyatlar</th>
                    <th>İstifadəçi kodu</th>
                    <th>Ad və soyad</th>
                    <th>Əlaqə nömrəsi</th>
                    <th>Balans</th>
                    <th>Borc</th>
                    <th>Tədarükçü borcu</th>
                    <th>Vəzifə</th>
                    <th>Qeydiyyat tarixi</th>
                    </thead>
                    <tbody>
                    @foreach($this->users as $user)
                        <tr>
                            <td>
                                <a href="{{url("user/details/$user->id")}}"
                                   wire:navigate
                                   class="btn btn-primary btn-small">
                                    <svg class="size-4" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                        <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                                        <line x1="16" y1="5" x2="19" y2="8"/>
                                    </svg>
                                    Düzəliş et
                                </a>
                            </td>
                            <td>{{$user->pid}}</td>
                            <td>
                                <p>
                                    {{$user->name}}
                                    @if(auth()->id() == $user->id)
                                        <br>
                                        <span
                                            class="inline-block text-xs bg-green-600 text-white p-1 rounded-md font-medium">Hazırki icraçı</span>
                                    @endif
                                </p>
                            </td>
                            <td class="whitespace-normal">
                                <p class="line-clamp-1 hover:line-clamp-none w-80">
                                    {{$user->phones->pluck("item")->implode(",")}}
                                </p>
                            </td>
                            <td>{{$user->balance}} AZN</td>
                            <td>{{$user->debt}} AZN</td>
                            <td>{{$user->remnant}} AZN</td>
                            <td>{{$user->role->name}}</td>
                            <td>{{$user->created_at->format("d-m-Y h:i")}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{$this->users->links()}}
        </div>
        <div x-show="state" x-transition
             class="my-container w-80 grid gap-3" wire:keydown.enter="search(false)">
            <div class="flex justify-between gap-4 items-center text-blue-700">
                <h1 class="text-2xl font-semibold">Ətraflı axtarış</h1>
                <button wire:click="$toggle('searchState')">
                    <svg class="size-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
            </div>
            <hr class="border-2 border-black">
            <div class="grid gap-1">
                <div class="my-label">İstifadəçi kodu</div>
                <input type="text" class="input w-full" wire:model="filters.pid">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ad və soyad</div>
                <input type="text" class="input w-full" wire:model="filters.name">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Əlaqə nömrəsi</div>
                <input type="text" class="input w-full" wire:model="filters.phone">
            </div>
            <div class="grid gap-1">
                <div class="my-label">Vəzifə</div>
                <div class="grid gap-2">
                    @foreach(\App\Models\UserRole::orderBy("name","asc")->get() as $role)
                        <label for="role-{{$role->id}}"
                               class="input">
                            <input type="checkbox" id="role-{{$role->id}}" value="{{$role->id}}"
                                   wire:model="filters.roles">
                            <span>{{$role->name}}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Balans</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.balance.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.balance.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Ümumi borc</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.debt.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.debt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Satış borcu</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.currentDebt.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.currentDebt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Köhnə borc</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.oldDebt.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.oldDebt.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Tədarükçü borcu</div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Min."
                           wire:model="filters.remnant.min">
                    <input type="number" step="0.01" class="input w-full !p-2.5" placeholder="Maks."
                           wire:model="filters.remnant.max">
                </div>
            </div>
            <div class="grid gap-1">
                <div class="my-label">Qeydiyyat tarixi</div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="grid gap-1">
                        <input type="text" class="input w-full" placeholder="gün-ay-il"
                               x-mask="99-99-9999" wire:model="filters.registeredAt.min">
                        <span class="text-xs">Tarixdən</span>
                    </div>
                    <div class="grid gap-1">
                        <input type="text" class="input w-full" placeholder="gün-ay-il"
                               x-mask="99-99-9999" wire:model="filters.registeredAt.max">
                        <span class="text-xs">Tarixə</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-3">
                <button wire:click.prevent="search(false)"
                        class="btn btn-primary">
                    <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <circle cx="10" cy="10" r="7"/>
                        <line x1="21" y1="21" x2="15" y2="15"/>
                    </svg>
                    Axtar
                </button>
                <button wire:click.prevent="search(true)"
                        class="btn btn-disabled !cursor-pointer">
                    <svg class="size-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
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


</div>
