<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    @include('frontend/header')
    <style>
        @media (min-width:320px)  {
            body{
                background-color: white;
            }
        }
        @media (min-width:480px)  {
            body{
                background-color: white;
            }
        }
        @media (min-width:600px)  {
            body{
                background-color: white;
            }
        }
        @media (min-width:801px)  {
            body{
                background-color: white;
            }
        }
        @media (min-width:1025px) {
            body{
                background-color: white;
            }
        }
        @media (min-width:1281px) {
            body{
                background-color: white;
            }
        }

        #soal {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            -webkit-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            -moz-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            border: 1px solid grey;
            background-color: white;
            padding: 20px;
            height: 600px;
            font-size:20px;
            overflow:auto;
        }

        #bordersoal {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            -webkit-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            -moz-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            border: 1px solid grey;
            background-color: white;
            padding: 5px;
            height: 600px;
            overflow:auto;
        }

        .raguragu {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            -webkit-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            -moz-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            width: 150px;
            border: 1px solid grey;
            background-color: yellow;
            padding: 10px;
            position: absolute;
            bottom: 20px;
            left: 20;
        }

        .nextsoal {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            -webkit-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            -moz-box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            box-shadow: -2px -1px 24px -4px rgba(0,0,0,0.52);
            width: 150px;
            border: 1px solid grey;
            background-color: green;
            padding: 10px;
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .pilihansoal {
            border-radius: 15px 15px 15px 15px;
            -moz-border-radius: 15px 15px 15px 15px;
            -webkit-border-radius: 15px 15px 15px 15px;
            border: 1px solid #000000;
            width: 40px;
            height: 40px;
            text-align:center;
        }

        .jarakpilihan {
            margin: 2px;
        }
    </style>
</head>

<body>
    @include('frontend/navbar')

        <div class="row" style="margin:5px;">
            <div class="col-md-10 py-3">
                <div id="soal">
                    <div>
                        <p>
                            <h3>TIU <hr></h3>
                            <h5>
                                1.  Semua siswa SMAN 1 Yogyakarta mengikuti upacara bendera. Nana siswa SMAN 1 Yogyakarta. Jadi...
                            </h5>
                        </p>
                        <input type="radio" name="pilihan"> A. Belum tentu Nana mengikuti upacara bendera 
                        <br>
                        <input type="radio" name="pilihan"> B. Nana tidak mengikuti upacara bendera
                        <br>
                        <input type="radio" name="pilihan"> C. Nana mungkin mengikuti upacara bendera
                        <br>
                        <input type="radio" name="pilihan"> D. Nana mengikuti upacara bendera
                        <br>
                        <input type="radio" name="pilihan"> E. Tidak dapat ditarik kesimpulan
                    </div>
                    <div class="raguragu" style="margin-bottom:1em;">
                        <input type="checkbox"> Ragu-Ragu
                    </div>
                    <button style="margin-bottom:1em;color:white;" type="submit" class="nextsoal">Selanjutnya</button>
                </div>
            </div>
            <div class="col-md-2 py-3">
                <div class="row" id="bordersoal">
                    <div class="col-xs-2 jarakpilihan">
                        <a href="">
                            <div class="pilihansoal" style="background-color:blue; color:white">
                                <h3>1</h3>
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal" style="background-color:yellow; color:black">
                            <h3>2</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>3</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>4</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>5</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>6</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>7</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>8</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>9</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>10</h3>
                        </div>
                    </div>
                           
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>11</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>12</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>13</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>14</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>15</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>16</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>17</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>18</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>19</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>20</h3>
                        </div>
                    </div>

                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>21</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>22</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>23</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>24</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>25</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>26</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>27</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>28</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>29</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>30</h3>
                        </div>
                    </div>

                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>31</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>32</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>33</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>34</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>35</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>36</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>37</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>38</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>39</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>40</h3>
                        </div>
                    </div>

                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>41</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>42</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>43</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>44</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>45</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>46</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>47</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>48</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>49</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>50</h3>
                        </div>
                    </div>

                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>51</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>52</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>53</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>54</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>55</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>56</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>57</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>58</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>59</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>60</h3>
                        </div>
                    </div>

                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>61</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>62</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>63</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>64</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>65</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>66</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>67</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>68</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>69</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>70</h3>
                        </div>
                    </div>

                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>71</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>72</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>73</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>74</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>75</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>76</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>77</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>78</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>79</h3>
                        </div>
                    </div>
                    <div class="col-xs-2 jarakpilihan">
                        <div class="pilihansoal">
                            <h3>80</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @include('frontend/script')
    <script>
        var bool = false
        $('#nosoal').show();
        function nosoal()
        {
            if(bool == 'false')
            {
                bool = true
            }else{
                bool = false
            }
            $("#nosoal").controlSidebar(bool);
            alert(bool)
        }

        $(document).ready(function() {
        var detik = 00;
        var menit = 30;
        var jam = 2;

        function hitung() {

            setTimeout(hitung, 1000);
            if (menit < 5 && jam == 0) {
                var peringatan = 'style="color:red"';
            };
            $('#waktu').html('Sisa Waktu : '+ jam + ' : ' + menit + ' : ' + detik );
            detik--;
            if (detik < 0) {
                detik = 59;
                menit--;
                if (menit < 0) {
                    menit = 59;
                    jam--;
                    if (jam < 0) {
                        clearInterval();
                    }
                }
            }
        }
        hitung();
    });
    </script>
</body>

</html>
