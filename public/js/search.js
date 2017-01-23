(function() {
    "use strict";

    let source = document.getElementById("template").innerHTML;
    let template = Handlebars.compile(source);
    let errContainer = document.querySelector('.error-msg');
    let searchContainer = document.querySelector('.search-container');
    let data = '';

    let queryType = 'track';
    let queryStr = ''


    document.querySelector('.query-type').addEventListener('change', function (e) {
        queryType = e.target.value;
        searchMusic(queryStr);
    });

    document.getElementById('searchMusic').addEventListener('keyup', _.debounce(keyUp, 1000));

    function keyUp(e) {
        queryStr = e.target.value;
        searchMusic(queryStr);
    }

    function searchMusic(str) {
        axios.get(`https://api.spotify.com/v1/search?query=${str}&offset=0&limit=20&type=${queryType}&market=TW`)
            .then(function (res) {
                console.log(res);
                data = res.data[(queryType + 's')].items;
                if (!data.length) {
                    errContainer.querySelector('span').innerHTML = 'No Results!';
                    searchContainer.innerHTML = ''
                    errContainer.classList.add('open');
                } else {
                    const html = template(data);
                    errContainer.querySelector('span').innerHTML = '';
                    errContainer.classList.remove('open');
                    searchContainer.innerHTML = html;
                }

            })
            .catch(function (error) {
                console.log(error);
            });
    }




}());