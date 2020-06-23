<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNITEN TAS v3.0</title>
    <!-- Font Awesome -->

    <!-- Stylesheet -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->



    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.css" rel="stylesheet">
    <link href="/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/colorPick.css">
    <script src="/js/all.js" crossorigin="anonymous"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="/css/all.css">
    <!-- Car Brand and Model dropdown js -->
    <script type="text/javascript">
        function populate(brd, mdl) {
            var brd = document.getElementById(brd);
            var mdl = document.getElementById(mdl);
            mdl.innerHTML = "";
            if (brd.value == "Alfa Romeo") {
                var optionArray = ["Select Model|Select Model", "147|147", "155|155", "159|159",
                    "4C|4C", "Giulia|Giulia", "Giulietta|Giulietta", "Stelvio|Stelvio"
                ];
            } else if (brd.value == "Audi") {
                var optionArray = ["Select Model|Select Model", "A1|A1", "A3|A3", "A4|A4",
                    "A5|A5", "A5 Sportback|A5 Sportback", "A6|A6", "A7|A7", "A8|A8",
                    "A8L|A8L", "Q2|Q2", "Q3|Q3", "Q7|Q7", "Q8|Q8", "R8|R8", "RS3|RS3", "RS4|RS4", "RS5|RS5",
                    "RS6|RS6", "RS7|RS7",
                    "S3|S3", "S4|S4", "S5|S5", "S6|S6", "S7|S7", "TT|TT"
                ];
            } else if (brd.value == "Austin") {
                var optionArray = ["Select Model|Select Model", "Morris|Morris"];
            } else if (brd.value == "BMW") {
                var optionArray = ["Select Model|Select Model", "1 Series|1 Series", "M2 Coupe|M2 Coupe",
                    "3 Series|3 Series", "4 Series Coupe|4 Series Coupe", "M4 Coupe|M4 Coupe", "5 Series|5 Series",
                    "M5|M5", "6 Series GT|6 Series GT", "7 Series|7 Series", "8 Series|8 Series", "X1|X1", "X2|X2",
                    "X3|X3", "X4|X4", "X5|X5", , "X6 M|X6 M", "X7|X7", "Z4|Z4", "i3s|i3s", "i8 Coupe|i8 Coupe"
                ];
            } else if (brd.value == "BMW Alpina") {
                var optionArray = ["Select Model|Select Model", "B3|B3"];
            } else if (brd.value == "Bentley") {
                var optionArray = ["Select Model|Select Model", "Azure|Azure", "Bentayga|Bentayga",
                    "Continental|Continental",
                    "Continental Flying Spur|Continental Flying Spur", "Continental GT|Continental GT",
                    "Continental GT Convertible|Continental GT Convertible", "Flying Spur|Flying Spur",
                    "Mulsanne|Mulsanne"
                ];
            } else if (brd.value == "Cadillac") {
                var optionArray = ["Select Model|Select Model", "CTS|CTS", "Escalade|Escalade"];
            } else if (brd.value == "Chery") {
                var optionArray = ["Select Model|Select Model", "Eastar|Eastar", "Maxime|Maxime", "Q22|Q22",
                    "Tiggo|Tiggo", "Transcom|Transcom"
                ];
            } else if (brd.value == "Chevrolet") {
                var optionArray = ["Select Model|Select Model", "Aveo|Aveo", "Camaro|Camaro", "Captiva|Captiva",
                    "Colorado|Colorado", "Corvette|Corvette", "Cruze|Cruze", "Malibu|Malibu", "Optra|Optra",
                    "Optra5|Optra5", "Sonic|Sonic"
                ];
            } else if (brd.value == "Chrysler") {
                var optionArray = ["Select Model|Select Model", "Crossfire|Crossfire"];
            } else if (brd.value == "Citroen") {
                var optionArray = ["Select Model|Select Model", "C4|C4", "C4 Picasso|C4 Picasso", "C5|C5", "C8|C8",
                    "DS3|DS3", "DS4|DS4", "DS5|DS5", "Grand C4 Picasso|Grand C4 Picasso", "Xsara|Xsara",
                    "Xsara Picasso|Xsara Picasso"
                ];
            } else if (brd.value == "Daihatsu") {
                var optionArray = ["Select Model|Select Model", "Copen|Copen", "Delta|Delta", "DELTA V58R|DELTA V58R",
                    "DELTA V58R-HS|DELTA V58R-HS",
                    "Gran Max|Gran Max", "Hijet|Hijet", "V116-HA|V116-HA", "V58|V58", "V58R-HS|V58R-HS"
                ];
            } else if (brd.value == "Dodge") {
                var optionArray = ["Select Model|Select Model", "Challenger|Challenger", "Charger|Charger"];
            } else if (brd.value == "Ferrari") {
                var optionArray = ["Select Model|Select Model", "360|360", "458 Italia|458 Italia",
                    "458 Spider|458 Spider", "488 GTB|488 GTB",
                    "488 Spider|488 Spider", "575M Maranello|575M Maranello", "599 GTB Fiorano|599 GTB Fiorano",
                    "California|California",
                    "F12 Berlinetta|F12 Berlinetta", "F430|F430", "Portofino|Portofino"
                ];
            } else if (brd.value == "Fiat") {
                var optionArray = ["Select Model|Select Model", "500|500", "500C|500C",
                    "Benimar Mileo 346|Benimar Mileo 346", "Punto|Punto"
                ];
            } else if (brd.value == "Ford") {
                var optionArray = ["Select Model|Select Model", "Econovan|Econovan", "EcoSport|EcoSport",
                    "Escape|Escape", "Everest|Everest", "F-150 Raptor|F-150 Raptor",
                    "Fiesta|Fiesta", "Focus|Focus", "Kuga|Kuga", "Laser|Laser", "Mondeo|Mondeo", "Mustang|Mustang",
                    "Ranger|Ranger", "S-Max|S-Max", "Spectron|Spectron",
                    "Telstar|Telstar", "Transit|Transit"
                ];
            } else if (brd.value == "Haval") {
                var optionArray = ["Select Model|Select Model", "H1|H1", "H2|H2"];
            } else if (brd.value == "Honda") {
                var optionArray = ["Select Model|Select Model", "Accord|Accord", "Airwave|Airwave", "BR-V|BR-V",
                    "City|City", "Civic|Civic", "CR-V|CR-V",
                    "CR-Z|CR-Z", "Crossroad|Crossroad", "Edix|Edix", "Elysion|Elysion", "Fit|Fit", "Freed|Freed",
                    "HR-V|HR-V", "Insight|Insight", "Integra|Integra",
                    "Jade|Jade", "Jazz|Jazz", "Legend|Legend", "N-Box|N-Box", "N-Box Custom|N-Box Custom",
                    "NSX|NSX", "Odyssey|Odyssey", "Prelude|Prelude", "S2000|S2000",
                    "S660|S660", "Step WGN|Step WGN", "Stream|Stream"
                ];
            } else if (brd.value == "Hummer") {
                var optionArray = ["Select Model|Select Model", "H2|H2", "H3|H3"];
            } else if (brd.value == "Infiniti") {
                var optionArray = ["Select Model|Select Model", "EX25|EX25", "FX37|FX37", "Q50|Q50", "Q70|Q70",
                    "QX70|QX70"
                ];
            } else if (brd.value == "Isuzu") {
                var optionArray = ["Select Model|Select Model", "D-Max|D-Max", "Elf|Elf", "MU-X|MU-X",
                    "N-series|N-series", "NHR|NHR", "NKR|NKR", "NLR|NLR", "NLR130|NLR130", "NLR77UEE|NLR77UEE",
                    "NPR|NPR", "NPR66|NPR66", "NPR70|NPR70", "NPR71|NPR71", "NPR75|NPR75", "NPR81|NPR81",
                    "NPR81UKH|NPR81UKH", "NPR85|NPR85", "Rodeo|Rodeo", "Trooper|Trooper"
                ];
            } else if (brd.value == "Jaguar") {
                var optionArray = ["Select Model|Select Model", "Daimler|Daimler",
                    "E-Type (Series 3)|E-Type (Series 3)", "F-Pace|F-Pace", "F-Type|F-Type", "Sovereign|Sovereign",
                    "X-Type|X-Type", "XE|XE", "XF|XF", "XJ|XJ", "XJ6|XJ6", "XKR|XKR"
                ];
            } else if (brd.value == "Jeep") {
                var optionArray = ["Select Model|Select Model", "Grand Cherokee|Grand Cherokee", "Wrangler|Wrangler"];
            } else if (brd.value == "Kia") {
                var optionArray = ["Select Model|Select Model", "Carnival|Carnival", "Cerato|Cerato", "Forte|Forte",
                    "Forte Koup|Forte Koup", "Grand Carnival|Grand Carnival", "Optima|Optima",
                    "Optima K5|Optima K5", "Picanto|Picanto", "Pregio|Pregio", "Rio|Rio", "Rocsta|Rocsta",
                    "Sephia|Sephia", "Sorento|Sorento", "Spectra|Spectra", "Sportage|Sportage"
                ];
            } else if (brd.value == "Lamborghini") {
                var optionArray = ["Select Model|Select Model", "Aventador|Aventador", "Gallardo|Gallardo",
                    "Huracan|Huracan", "Urus|Urus"
                ];
            } else if (brd.value == "Land Rover") {
                var optionArray = ["Select Model|Select Model", "Defender|Defender", "Discovery|Discovery",
                    "Discovery 2|Discovery 2", "Discovery 3|Discovery 3", "Discovery 4|Discovery 4",
                    "Discovery Sport|Discovery Sport", "Freelander|Freelander", "Freelander 2|Freelander 2",
                    "Range Rover|Range Rover", "Range Rover Evoque|Range Rover Evoque",
                    "Range Rover Sport|Range Rover Sport", "Range Rover Velar|Range Rover Velar",
                    "Range Rover Vogue Autobiography|Range Rover Vogue Autobiography"
                ];
            } else if (brd.value == "Lexus") {
                var optionArray = ["Select Model|Select Model", "CT200h|CT200h", "ES250|ES250", "GS F|GS F",
                    "GS200t|GS200t", "GS250|GS250", "GS300|GS300",
                    "GS300h|GS300h", "GS350|GS350", "IS200t|IS200t", "IS250|IS250", "IS300h|IS300h", "LC500|LC500",
                    "LS 400|LS 400", "LS460|LS460", "LS460L|LS460L", "LX450d|LX450d",
                    "LX470|LX470", "LX570|LX570", "NX200t|NX200t", "NX300|v", "NX300h|NX300h", "RC F|RC F",
                    "RC200t|RC200t", "RC300h|RC300h", "RX200t|RX200t", "RX270|RX270", "RX300|RX300", "RX350|RX350",
                    "RX450h|RX450h", "UX200|UX200"
                ];
            } else if (brd.value == "Lotus") {
                var optionArray = ["Select Model|Select Model", "Evora|Evora", "Exige|Exige"];
            } else if (brd.value == "Maserati") {
                var optionArray = ["Select Model|Select Model", "Ghibli|Ghibli", "GranCabrio|GranCabrio",
                    "GranTurismo|GranTurismo", "Levante|Levante", "Quattroporte|Quattroporte"
                ];
            } else if (brd.value == "McLaren") {
                var optionArray = ["Select Model|Select Model", "540C|540C", "570S|570S", "650S Spider|650S Spider",
                    "675LT|675LT", "720S|720S", "MP4-12C|MP4-12C"
                ];
            } else if (brd.value == "Mercedes Benz") {
                var optionArray = ["Select Model|Select Model", "A-Class|A-Class", "AMG GT|AMG GT", "B-Class|B-Class",
                    "C-Class|C-Class", "CL-Class|CL-Class", "CLA-Class|CLA-Class", "CLC-Class|CLC-Class",
                    "CLK-Class|CLK-Class", "CLS-Class|CLS-Class", "E-Class|E-Class", "G-Class|G-Class",
                    "GL-Class|GL-Class", "GLA-Class|GLA-Class", "GLC-Class|GLC-Class", "GLE-Class|GLE-Class",
                    "ML-Class|ML-Class", "R-Class|R-Class", "S-Class|S-Class", "SL-Class|SL-Class",
                    "SLC-Class|SLC-Class", "SLK-Class|SLK-Class", "SLS AMG|SLS AMG", "V-Class|V-Class",
                    "No Group|No Group"
                ];
            } else if (brd.value == "Mercedes-Maybach") {
                var optionArray = ["Select Model|Select Model", "S600|S600"];
            } else if (brd.value == "Mitsubishi") {
                var optionArray = ["Select Model|Select Model", "Airtrek|Airtrek", "ASX|ASX", "Attrage|Attrage",
                    "Canter|Canter", "Challenger|Challenger", "Chariot|Chariot", "Delica|Delica", "Evo|Evo",
                    "FB Series|FB Series", "FE71PB|FE71PB", "FE83PG|FE83PG", "FG638|FG638", "Fuso|Fuso",
                    "Galant|Galant", "Grandis|Grandis", "Jeep|Jeep", "Lancer|Lancer", "Mirage|Mirage",
                    "Outlander|Outlander", "Pajero|Pajero", "Pajero Sport|Pajero Sport", "Storm|Storm",
                    "Triton|Triton"
                ];
            } else if (brd.value == "Mitsuoka") {
                var optionArray = ["Select Model|Select Model", "Galue|Galue", "Ryoga|Ryoga"];
            } else if (brd.value == "Naza") {
                var optionArray = ["Select Model|Select Model", "Citra|Citra", "Ria|Ria", "Rondo|Rondo",
                    "Sutera|Sutera"
                ];
            } else if (brd.value == "Nissan") {
                var optionArray = ["Select Model|Select Model", "350Z|350Z", "370Z|370Z", "Ad Resort|Ad Resort",
                    "Almera|Almera", "Cabstar|Cabstar", "CD45|CD45", "CD48|CD48", "Cefiro|Cefiro", "Cube|Cube",
                    "Dualis|Dualis", "Elgrand|Elgrand", "Fairlady Z|Fairlady Z", "Frontier|Frontier",
                    "Grand Livina|Grand Livina", "GT-R|GT-R", "JUKE|JUKE", "Latio|Latio", "Leaf|Leaf",
                    "Livina X-Gear|Livina X-Gear", "March|March", "MK210N|MK210N", "Murano|Murano", "Navara|Navara",
                    "NV200|NV200", "NV350|NV350", "PGC22|PGC22", "Sentra|Sentra", "Serena|Serena", "SK82|SK82",
                    "Skyline|Skyline", "Sunny|Sunny", "Sylphy|Sylphy", "Teana|Teana", "Terrano|Terrano", "UD|UD",
                    "UD CBP15NE|UD CBP15NE", "Urvan|Urvan", "Vanette|Vanette", "X-Trail|X-Trail", "YU41H4|YU41H4",
                    "YU41H5|YU41H5", "YU41T5|YU41T5"
                ];
            } else if (brd.value == "Perodua") {
                var optionArray = ["Select Model|Select Model", "Alza|Alza", "Aruz|Aruz", "Axia|Axia", "Bezza|Bezza",
                    "Kancil|Kancil", "Kelisa|Kelisa", "Kembara|Kembara",
                    "Kenari|Kenari", "Myvi|Myvi", "Nautica|Nautica", "Rusa|Rusa", "Viva|Viva"
                ];
            } else if (brd.value == "Peugeot") {
                var optionArray = ["Select Model|Select Model", "206|206", "207|207", "208|208", "307|307",
                    "308|308", "406|406", "407|407", "408|408", "508|508", "2008|2008", "3008|3008", "5008|5008",
                    "RCZ|RCZ", "Traveller|Traveller"
                ];
            } else if (brd.value == "Porsche") {
                var optionArray = ["Select Model|Select Model", "718|718", "911|911", "944|944", "Boxster|Boxster",
                    "Cayenne|Cayenne", "Cayman|Cayman", "Macan|Macan",
                    "Panamera|Panamera"
                ];
            } else if (brd.value == "Proton") {
                var optionArray = ["Select Model|Select Model", "Arena|Arena", "Ertiga|Ertiga", "Exora|Exora",
                    "Gen-2|Gen-2", "Inspira|Inspira", "Iriz|Iriz", "Iswara|Iswara", "Perdana|Perdana",
                    "Persona|Persona", "Preve|Preve", "Putra|Putra", "Saga|Saga", "Satria|Satria",
                    "Satria Neo|Satria Neo", "Savvy|Savvy", "Suprima S|Suprima S", "Waja|Waja", "Wira|Wira",
                    "X70|X70"
                ];
            } else if (brd.value == "Renault") {
                var optionArray = ["Select Model|Select Model", "Captur|Captur", "Clio|Clio", "Fluence|Fluence",
                    "Grand Scenic|Grand Scenic",
                    "Kangoo|Kangoo", "Koleos|Koleos", "Megane|Megane"
                ];
            } else if (brd.value == "Rolls-Royce") {
                var optionArray = ["Select Model|Select Model", "Cullinan|Cullinan", "Dawn|Dawn", "Ghost|Ghost",
                    "Phantom|Phantom",
                    "Silver Shadow II|Silver Shadow II", "Silver Spur|Silver Spur", "Wraith|Wraith"
                ];
            } else if (brd.value == "Rover") {
                var optionArray = ["Select Model|Select Model", "75|75", "216|216"];
            } else if (brd.value == "Smart") {
                var optionArray = ["Select Model|Select Model", "Forfour|Forfour", "Fortwo|Fortwo",
                "Roadster|Roadster"];
            } else if (brd.value == "Ssangyong") {
                var optionArray = ["Select Model|Select Model", "Actyon|Actyon", "Actyon Sports|Actyon Sports",
                    "Kyron|Kyron", "Rexton|Rexton",
                    "Rexton II|Rexton II", "Stavic|Stavic"
                ];
            } else if (brd.value == "Subaru") {
                var optionArray = ["Select Model|Select Model", "BRZ|BRZ", "Forester|Forester", "Impreza|Impreza",
                    "Legacy|Legacy",
                    "Levorg|Levorg", "Outback|Outback", "WRX|WRX", "WRX STi|WRX STi", "XV|XV"
                ];
            } else if (brd.value == "Suzuki") {
                var optionArray = ["Select Model|Select Model", "Alto|Alto", "APV|APV", "ERV|ERV",
                    "Grand Vitara|Grand Vitara",
                    "Jimny|Jimny", "Jimny Sierra|Jimny Sierra", "Kizashi|Kizashi", "Swift|Swift", "SX4|SX4",
                    "Vitara|Vitara"
                ];
            } else if (brd.value == "Tesla") {
                var optionArray = ["Select Model|Select Model", "Model S|Model S"];
            } else if (brd.value == "Toyota") {
                var optionArray = ["Select Model|Select Model", "86|86", "Alphard|Alphard", "Altezza|Altezza",
                    "Altis|Altis", "Avanza|Avanza", "bB|bB", "C-HR|C-HR", "Caldina|Caldina", "Camry|Camry",
                    "Celica|Celica", "Century|Century", "Corolla|Corolla", "Corolla Altis|Corolla Altis",
                    "Crown|Crown", "Crown Athlete|Crown Athlete", "Cynos|Cynos", "Dyna|Dyna", "Esquire|Esquire",
                    "Previa|Previa", "FJ Cruiser|FJ Cruiser", "Fortuner|Fortuner", "Harrier|Harrier", "Hiace|Hiace",
                    "Hilux|Hilux", "Innova|Innova", "Ipsum|Ipsum", "Land Cruiser|Land Cruiser",
                    "Land Cruiser Cygnus|Land Cruiser Cygnus", "Land Cruiser Prado|Land Cruiser Prado",
                    "Liteace|Liteace", "LY131|LY131", "Mark X|Mark X", "Mark X Zio|Mark X Zio", "MRS|MRS",
                    "Nadia|Nadia", "Noah|Noah", "Opa|Opa", "Porte|Porte", "Prado|Prado", "Prius|Prius",
                    "Prius C|Prius C", "RAV4|RAV4", "Rush|Rush", "Sera|Sera", "Sienta|Sienta", "Soarer|Soarer",
                    "Starlet|Starlet", "Unser|Unser", "Vanguard|Vanguard", "Vellfire|Vellfire", "Vios|Vios",
                    "Voltz|Voltz", "Voxy|Voxy", "Wish|Wish", "Yaris|Yaris"
                ];
            } else if (brd.value == "Volkswagen") {
                var optionArray = ["Select Model|Select Model", "Beetle|Beetle", "CC|CC", "Cross Polo|Cross Polo",
                    "Cross Touran|Cross Touran",
                    "EOS|EOS", "Golf|Golf", "Jetta|Jetta", "KOMBI|KOMBI", "Passat|Passat", "Polo|Polo",
                    "Scirocco|Scirocco", "Sharan|Sharan", "Tiguan|Tiguan", "Touareg|Touareg", "Touran|Touran",
                    "UPI|UPI", "Vento|Vento"
                ];
            } else if (brd.value == "Volvo") {
                var optionArray = ["Select Model|Select Model", "850|850", "C30|C30", "S40|S40", "S60|S60",
                    "S70|S70", "S80|S80", "S90|S90", "V40|V40", "V40 Cross Country|V40 Cross Country", "V50|V50",
                    "V60|V60", "V90|V90", "XC40|XC40", "XC60|XC60", "XC90|XC90"
                ];
            } else if (brd.value == "Wald") {
                var optionArray = ["Select Model|Select Model", "WBE(Honda Edix)|WBE(Honda Edix)",
                    "WH(Toyota Harrier)|WH(Toyota Harrier)", "WW(Toyota Wish)|WW(Toyota Wish)"
                ];
            }
            for (var option in optionArray) {
                var pair = optionArray[option].split("|");
                var newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                mdl.options.add(newOption);
            }
        }

    </script>

    <style>
        .content {
            min-height: 100vh;
            height: auto;
            transition: all 0.2s ease-in-out;
        }

        .button-collapse {
            position: fixed;
            left: 10px;
            top: 10px;
            z-index: 10;
        }

        @media(min-width: 1440px) {
            .content {
                padding-left: 250px;
            }
        }

        .sidebarlogo {
            height: auto;
            width: auto;
        }

        .iconcustom {
            font-size: 1.5em !important;
        }

        .sidenavbg {
            background-color: #43425D;
        }

        .profilecard {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            font-weight: 400;
            border: 0;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12)
        }

        .profileview {
            height: 250px;
            width: 250px;
            margin-top: 1%;
            margin-left: 1%;
            margin-bottom: 1%;
            position: relative;
            overflow: hidden;
            cursor: default
        }

        .profilecard {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .carWhite {
            color: #ffffff;
        }

        .carYellow {
            color: yellow;
        }

        .carBlue {
            color: blue;
        }

        .carRed {
            color: red;
        }

        .carGreen {
            color: green;
        }

        .carBlack {
            color: black;
        }

        .carBrown {
            color: brown;
        }

        .carTeal {
            color: teal;
        }

        .carPurple {
            color: purple;
        }

        .carOrange {
            color: orange;
        }

        .carCyan {
            color: cyan;
        }

        .outline {
            -webkit-text-stroke: 1px black;
        }

    </style>
</head>

<body class="fixed-sn deep-purple-skin">

    <!--Double navigation-->
    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav fixed">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light" style="height: 175px;">
                        <a href="{{ url('/') }}"><img src="/images/taslogo.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li><a href="{{ url('Attendance')}}"><i class="fas fa-user-check"></i> Attendance</a>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-car"></i> Vehicle(s)<i
                                    class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('Vehicle')}}" class="waves-effect">View Registered Vehicle</a>
                                    </li>
                                    <li><a href="{{ route('Vehicle.create')}}" class="waves-effect">Register Vehicle</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ url('violation')}}"><i class="fas fa-exclamation iconcustom"></i>Violation(s)</a>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg rgba-purple-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>UNITEN TAS v3.0</p>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">

                    <!-- Profile pic in navbar -->
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="position: relative; padding-left:50px">
                        <img src="/images/{{ Auth::user()->avatar }}"
                            style="width:32px; height:32px; position:absolute;bottom:1px; left:10px; border-radius:50%">{{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile">
                            Profile
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->
    <main>
        @yield('content')
    </main>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <!-- JQuery -->

    <!-- Bootstrap tooltips -->

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="/js/mdb.js"></script>
    <script>
        $(document).ready(function () {

            // SideNav Button Initialization
            $(".button-collapse").sideNav();
            // SideNav Scrollbar Initialization
            var sideNavScrollbar = document.querySelector('.custom-scrollbar');
            var ps = new PerfectScrollbar(sideNavScrollbar);
        })

    </script>
    <script src="/js/ntc.js"></script>
    <script src="/js/colorPick.js"></script>
    <script>
        $(".colorPickSelector").colorPick({
            'initialColor': '#0000FF',
            'allowRecent': true,
            'recentMax': 5,
            'allowCustomColor': false,
            'palette': ["#0000FF", "#000000", "#00FF00", "#FFFFFF", "#FF0000", "#FFFF00", "#00FFFF", "#800080",
                "#008080", "#808080", "#C0C0C0", "#800000"
            ],
            'onColorSelected': function () {
                this.element.css({
                    'backgroundColor': this.color,
                    'color': this.color
                });
                result = ntc.name(this.color);
                console.log(this.color);
                console.log(result[1]);
                $("#carcolour").val(result[1]);
            }
        });

    </script>

    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#picupload").change(function () {
            readURL(this);
        });

    </script>
    @include('sweetalert::alert')

</body>
