/*
    Global state where we save:
    1. Currency rates (based on remote API)
    2. User selected Currency (based on dropdown menu)
    3. The list of available courses
 */
let rates = {};
let selectedCurrency = "GBP";
let courses = [];

const onCurrencyChange = (e) => {
    const value = e.target.value;
    selectedCurrency = value;
    printTable(courses);
}

/*
    This method loads the courses list asynchronously using Ajax request
 */
const getCourses = async () => {
    const data = await fetch('courses.json');
    const courses = await data.json();
    return courses;
}

/*
    This method loads the latest rates based on `currencyapi.net`.
    Because the free plan has limited request frequency, we have mocked the response
    in case of exception, in order to have a non-breaking application
*/
const getRates = async () => {
    try {
        const url = 'https://currencyapi.net/api/v1/rates?key=RojiWdL67lW28D8BSJcFtvtunJUsJWD8fA0y&output=JSON';
        const data = await fetch(url);
        const jsonData = await data.json();
        return jsonData.rates;
    }catch (e) {
        const mockedRes =  '{"AED":3.673,"AFN":70.78345,"ALL":92.76635,"AMD":390.2011,"ANG":1.814098,"AOA":855.5,"ARS":904.418,"AUD":1.51653,"AWG":1.8025,"AZN":1.7,"BAM":1.807996,"BBD":2.032355,"BCH":0.00211676,"BDT":118.2251,"BGN":1.81026,"BHD":0.3768893,"BIF":2892.165,"BMD":1,"BND":1.354379,"BOB":6.955396,"BRL":5.3451,"BSD":1.00661,"BTC":0.00001434172,"BTG":0.032406437,"BWP":13.83591,"BZD":2.028935,"CAD":1.37725,"CDF":2828,"CHF":0.8981536,"CLP":913.9265,"CNH":7.2431,"CNY":7.2478,"COP":3967.645,"CRC":532.0083,"CUC":1,"CUP":24.15808,"CVE":101.9321,"CZK":22.8102,"DASH":0.0381,"DJF":179.2189,"DKK":6.9119,"DOP":59.76427,"DZD":134.4876,"EGP":47.53039,"EOS":1.409022,"ETB":57.8862,"ETH":0.0002696398,"EUR":0.9247,"FJD":2.25895,"GBP":0.7873706,"GEL":2.825,"GHS":14.97296,"GIP":0.7873706,"GMD":67.775,"GNF":8668.361,"GTQ":7.821585,"GYD":210.5939,"HKD":7.8116,"HNL":24.86989,"HRK":6.8253273,"HTG":133.5244,"HUF":362.3,"IDR":16276.8,"ILS":3.76289,"INR":83.52695,"IQD":1318.604,"IRR":42100,"ISK":138.6,"JMD":156.4779,"JOD":0.7088,"JPY":156.7275,"KES":131.3612,"KGS":87.3013,"KHR":4137.74,"KMF":452.45,"KRW":1380.04,"KWD":0.3066,"KYD":0.838826,"KZT":450.5755,"LAK":21712.04,"LBP":90139.87,"LKR":304.7007,"LRD":195.23,"LSL":19.03749,"LTC":0.0124409,"LYD":4.867113,"MAD":9.93492,"MDL":17.7712,"MKD":56.90317,"MMK":2727.711,"MOP":8.096603,"MUR":45.78692,"MVR":15.4,"MWK":1745.32,"MXN":18.4136,"MYR":4.691,"MZN":63.5,"NAD":19.03749,"NGN":1471.22,"NIO":37.05107,"NOK":10.713,"NPR":134.3665,"NZD":1.63626,"OMR":0.384978,"PAB":1.00661,"PEN":3.783684,"PGK":3.865034,"PHP":58.7655,"PKR":279.9317,"PLN":4.002205,"PYG":7581.234,"QAR":3.671736,"RON":4.604,"RSD":108.2314,"RUB":89.43841,"RWF":1308.898,"SAR":3.750534,"SBD":8.482503,"SCR":13.6722,"SDG":586,"SEK":10.5897,"SGD":1.3508,"SLL":19750,"SOS":575.2716,"SRD":31.668,"SVC":8.80795,"SZL":19.03305,"THB":36.785,"TJS":10.80573,"TMT":3.51,"TND":3.118465,"TOP":2.3526,"TRY":32.3823,"TTD":6.813959,"TWD":32.4088,"TZS":2637.301,"UAH":40.47627,"UGX":3815.114,"USD":1,"UYU":39.34366,"UZS":12743.24,"VND":25410,"XAF":606.385,"XAG":0.03427650859483453,"XAU":0.0004359492467886889,"XCD":2.70255,"XLM":10.0841,"XOF":606.385,"XRP":2.016785,"YER":250.425,"ZAR":18.91768,"ZMW":26.54865}';
        return JSON.parse(mockedRes);
    }
}

/*
    Mapping level codes to labels
*/
const getLevelDescription = (levelCode) => {
    const levelMapping = {
        'bsc': 'Bachelor',
        'msc': 'Master',
        'udg': 'Undergraduate'
    }

    return levelMapping[levelCode] ?? levelCode;
}

/*
    Converts a months duration to readable text.
    Example: `1 year and 8 months`
*/
const formatDuration = (totalMonths) => {
    const years = Math.floor(totalMonths / 12);
    const months = totalMonths % 12;

    return `${years} ${years > 1 ? 'years' : 'year'}${months ? ` and ${months} months` : ''}`;
}


/*
    Converts a months duration to readable text based on [min, max]
    Example:

    [12, 12] === 1 year
    [12, 13] === 1 year to 1 year and 1 month
*/
const displayDuration = (duration) => {
    if (!Array.isArray(duration) || duration.length !== 2) return '-';

    const [start, end] = duration;
    const startingYear = start / 12;
    const endingYear = end / 12;
    const totalYearDuration = endingYear - startingYear;

    if (totalYearDuration < 0) {
        return '-';
    }

    if (totalYearDuration >= 1 && Number.isInteger(totalYearDuration)) {
        return `${startingYear} - ${endingYear} years`;
    }

    if (totalYearDuration > 1 && !Number.isInteger(totalYearDuration)) {
        return `${formatDuration(start)} - ${formatDuration(end)}`;
    }

    if (start === end) {
        return formatDuration(start);
    }

    if (end - start > 0 && end - start < 12) {
        return `${formatDuration(start)} - ${formatDuration(end)}`;
    }

    return '-';
}

const displayOnCurrentCurrency = (poundsAmount) => {
    if(!poundsAmount) return '--';
    const currencyIconsMapper = {
        'EUR': '&euro;',
        'GBP': '&#163;',
        'USD': '&#36;'
    }
    const amount =  poundsAmount * rates[selectedCurrency];
    return `${currencyIconsMapper[selectedCurrency]}  ${amount.toLocaleString({maximumFractionDigits:2})}`;
}

/*
    This method renders the table in runtime, using the asynchronous data
    and the window.document API
*/
const printTable = (items) => {
    const table = document.querySelector('#courses-table');
    let tBody = '';
    items.forEach(item => {
        tBody += `
        <tr class="courses-table-body-row">
            <td class="courses-table-body-item">
            <div class="image-container">
                <img src="${item.image}" class="course-image">
                <span>${item.name}</span>
            </div>
            </td>
            <td class="courses-table-body-item">
                ${item.description}
            </td>
            <td class="courses-table-body-item">
                ${getLevelDescription(item.level)}
            </td>
            <td class="courses-table-body-item">
                ${item.startingMonths.map(month => {
            const year = new Date().getFullYear();
            const day = new Date().getDate();
            const date = new Date(year, month, day);
            return new Intl.DateTimeFormat('en-US', { month: 'long' })
                .format(date)
        }).join(', ')}
            </td>
            <td class="courses-table-body-item">
                ${displayDuration(item.duration?.fullTime)}
            </td>
            <td class="courses-table-body-item">
                ${displayDuration(item.duration?.partTime)}
            </td>
            <td class="courses-table-body-item">
                ${displayDuration(item.duration?.foundation)}
            </td>
            <td class="courses-table-body-item">
                ${item.location || 'Distance learning'}
            </td>
            <td class="courses-table-body-item">
                ${displayOnCurrentCurrency(item.fees.uk?.fullTime)}
            </td>
            <td class="courses-table-body-item">
                ${displayOnCurrentCurrency(item.fees.uk?.partTime)}
            </td>
            <td class="courses-table-body-item">
                ${displayOnCurrentCurrency(item.fees.uk?.foundation)}
            </td>
            <td class="courses-table-body-item">
                ${displayOnCurrentCurrency(item.fees.international?.fullTime)}
            </td>
            <td class="courses-table-body-item">
                ${displayOnCurrentCurrency(item.fees.international?.partTime)}
            </td>
            <td class="courses-table-body-item">
                ${displayOnCurrentCurrency(item.fees.international?.foundation)}
            </td>
            <td class="courses-table-body-item">
                ${item.entryRequirements.join('<br>')}
            </td>
            <td class="courses-table-body-item">
                
            </td>
             <td class="courses-table-body-item">
                social.... 
            </td>
        </tr>
        `;
    });
    table.children[1].innerHTML = tBody;
}

/*
    Boot the application.
    Make a request for the courses, and one for the latest Rates
 */
async function start() {
    courses = await getCourses();
    rates = await getRates();
    printTable(courses);
}

/*
    Initialize frontEnd application, after the entire DOM has loaded: `DOMContentLoaded` Event.
 */
document.addEventListener('DOMContentLoaded', async () => {
    const currencySelector = document.querySelector('#currency-selector');
    currencySelector.addEventListener('input', onCurrencyChange);
    await start();
});