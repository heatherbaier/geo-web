// iso_to_name.js
var isoToCountryMap = {'afg': 'Afghanistan',
    'alb': 'Albania',
    'dza': 'Algeria',
    'and': 'Andorra',
    'ago': 'Angola',
    'atg': 'Antigua and Barbuda',
    'arg': 'Argentina',
    'arm': 'Armenia',
    'aus': 'Australia',
    'aut': 'Austria',
    'aze': 'Azerbaijan',
    'bhs': 'Bahamas',
    'bhr': 'Bahrain',
    'bgd': 'Bangladesh',
    'brb': 'Barbados',
    'blr': 'Belarus',
    'bel': 'Belgium',
    'blz': 'Belize',
    'ben': 'Benin',
    'btn': 'Bhutan',
    'bol': 'Bolivia',
    'bih': 'Bosnia and Herzegovina',
    'bwa': 'Botswana',
    'bra': 'Brazil',
    'brn': 'Brunei Darussalam',
    'bgr': 'Bulgaria',
    'bfa': 'Burkina Faso',
    'bdi': 'Burundi',
    'khm': 'Cambodia',
    'cmr': 'Cameroon',
    'can': 'Canada',
    'cpv': 'Cabo Verde',
    'caf': 'Central African Republic',
    'tcd': 'Chad',
    'chl': 'Chile',
    'chn': 'China',
    'col': 'Colombia',
    'com': 'Comoros',
    'cog': 'Congo',
    'cod': 'Congo, Democratic Republic of the',
    'cri': 'Costa Rica',
    'civ': "Côte d'Ivoire",
    'hrv': 'Croatia',
    'cub': 'Cuba',
    'cyp': 'Cyprus',
    'cze': 'Czechia',
    'dnk': 'Denmark',
    'dji': 'Djibouti',
    'dma': 'Dominica',
    'dom': 'Dominican Republic',
    'ecu': 'Ecuador',
    'egy': 'Egypt',
    'slv': 'El Salvador',
    'gnq': 'Equatorial Guinea',
    'eri': 'Eritrea',
    'est': 'Estonia',
    'eth': 'Ethiopia',
    'fji': 'Fiji',
    'fin': 'Finland',
    'fra': 'France',
    'gab': 'Gabon',
    'gmb': 'Gambia',
    'geo': 'Georgia',
    'deu': 'Germany',
    'gha': 'Ghana',
    'grc': 'Greece',
    'grd': 'Grenada',
    'gtm': 'Guatemala',
    'gin': 'Guinea',
    'gnb': 'Guinea-Bissau',
    'guy': 'Guyana',
    'hti': 'Haiti',
    'hnd': 'Honduras',
    'hun': 'Hungary',
    'isl': 'Iceland',
    'ind': 'India',
    'idn': 'Indonesia',
    'irn': 'Iran (Islamic Republic of)',
    'irq': 'Iraq',
    'irl': 'Ireland',
    'isr': 'Israel',
    'ita': 'Italy',
    'jam': 'Jamaica',
    'jpn': 'Japan',
    'jor': 'Jordan',
    'kaz': 'Kazakhstan',
    'ken': 'Kenya',
    'kir': 'Kiribati',
    'prk': "Korea (Democratic People's Republic of)",
    'kor': 'Korea, Republic of',
    'kwt': 'Kuwait',
    'kgz': 'Kyrgyzstan',
    'lao': "Lao People's Democratic Republic",
    'lva': 'Latvia',
    'lbn': 'Lebanon',
    'lso': 'Lesotho',
    'lbr': 'Liberia',
    'lby': 'Libya',
    'lie': 'Liechtenstein',
    'ltu': 'Lithuania',
    'lux': 'Luxembourg',
    'mkd': 'North Macedonia',
    'mdg': 'Madagascar',
    'mwi': 'Malawi',
    'mys': 'Malaysia',
    'mdv': 'Maldives',
    'mli': 'Mali',
    'mlt': 'Malta',
    'mhl': 'Marshall Islands',
    'mrt': 'Mauritania',
    'mus': 'Mauritius',
    'mex': 'Mexico',
    'fsm': 'Micronesia (Federated States of)',
    'mar': 'Morocco',
    'mda': 'Moldova, Republic of',
    'mco': 'Monaco',
    'mng': 'Mongolia',
    'mne': 'Montenegro',
    'moz': 'Mozambique',
    'mmr': 'Myanmar',
    'nam': 'Namibia',
    'nru': 'Nauru',
    'npl': 'Nepal',
    'nld': 'Netherlands',
    'nzl': 'New Zealand',
    'nic': 'Nicaragua',
    'ner': 'Niger',
    'nig': 'Nigeria',
    'nor': 'Norway',
    'omn': 'Oman',
    'pak': 'Pakistan',
    'plw': 'Palau',
    'pan': 'Panama',
    'png': 'Papua New Guinea',
    'pry': 'Paraguay',
    'per': 'Peru',
    'phl': 'Philippines',
    'pol': 'Poland',
    'prt': 'Portugal',
    'qat': 'Qatar',
    'rou': 'Romania',
    'rus': 'Russian Federation',
    'rwa': 'Rwanda',
    'kna': 'Saint Kitts and Nevis',
    'lca': 'Saint Lucia',
    'vct': 'Saint Vincent and the Grenadines',
    'wsm': 'Samoa',
    'smr': 'San Marino',
    'stp': 'Sao Tome and Principe',
    'sau': 'Saudi Arabia',
    'sen': 'Senegal',
    'srb': 'Serbia',
    'syc': 'Seychelles',
    'sle': 'Sierra Leone',
    'sgp': 'Singapore',
    'svk': 'Slovakia',
    'svn': 'Slovenia',
    'slb': 'Solomon Islands',
    'som': 'Somalia',
    'zaf': 'South Africa',
    'ssd': 'South Sudan',
    'esp': 'Spain',
    'lka': 'Sri Lanka',
    'sdn': 'Sudan',
    'sur': 'Suriname',
    'swz': 'Eswatini',
    'swe': 'Sweden',
    'che': 'Switzerland',
    'syr': 'Syrian Arab Republic',
    'tjk': 'Tajikistan',
    'tan': 'Tanzania',
    'tha': 'Thailand',
    'tls': 'Timor-Leste',
    'tgo': 'Togo',
    'ton': 'Tonga',
    'tto': 'Trinidad and Tobago',
    'tun': 'Tunisia',
    'tur': 'Türkiye',
    'tkm': 'Turkmenistan',
    'tuv': 'Tuvalu',
    'uga': 'Uganda',
    'ukr': 'Ukraine',
    'are': 'United Arab Emirates',
    'gbr': 'United Kingdom of Great Britain and Northern Ireland',
    'usa': 'United States of America',
    'ury': 'Uruguay',
    'uzb': 'Uzbekistan',
    'vut': 'Vanuatu',
    'ven': 'Venezuela (Bolivarian Republic of)',
    'vnm': 'Viet Nam',
    'yem': 'Yemen',
    'zmb': 'Zambia',
    'zwe': 'Zimbabwe'
}