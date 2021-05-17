@extends('layouts.front')

@section('title')
    Daily Readings
@endsection

@section('readings')
    <script>

        function receivedUniversalisItem(thing)
        {var where=document.getElementById("Universalis_" + thing);
        if (where)
        where.style.display="block";
        };
        function setUniversalisElement(thing,text)
        {var where=document.getElementById("Universalis_" + thing);
        if (where)
        where.innerHTML=text;
        };
        function universalisCallback(data)
        {for (var thing in data)
        {receivedUniversalisItem(thing);
        var d=data[thing];
        if (typeof d != "object")
            {setUniversalisElement(thing,d)
            }
            else
            {for (var t in d)
            {var dd=d[t];
                setUniversalisElement(thing + "." + t,dd);
                }
            }
        }
        }
        !function(d,id,region,day){function yyyymmdd(day){var now=new Date();var delta=day==7?7-now.getDay():0;var when=new Date(now.getTime()+86400000*delta);return (1900+when.getYear())*10000+(1+when.getMonth())*100+when.getDate();};var js,fjs=d.getElementsByTagName('script')[0];if(!d.getElementById(id)){js=d.createElement('script');js.id=id;js.src=document.location.protocol+'//universalis.com/' + (region==""?region:region+"/") + yyyymmdd(day) + '/jsonpmass.js?callback=universalisCallback';fjs.parentNode.insertBefore(js,fjs);}}(document, 'universalis-js',
        /* CUSTOMIZATION: the local calendar

        Insert the name of the local calendar: for instance, "Europe.England.Westminster". For the General Calendar, use an empty string: just "".
        */

        "Europe.England.Westminster"
        , // Leave this comma here: it really is needed!

        /* CUSTOMIZATION: which day do you want?
        Insert 1 for today's readings.
        Insert 7 for next Sunday's readings.
        */

        1
        );

        /* ADVANCED CUSTOMIZATION:
        If you want to have today's readings and the Sunday readings both on the same page, then you will have to call the web site twice, once for each of the two days, and have a different callback each time. This isn't rocket science but it does mean rewriting the Javascript we have given you, so the best thing is to complain to whoever asked you to do it!
        */
    </script>

@endsection


@section('content')
<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Daily Readings</h2>
            <ol>
                <li><a href="{{route('welcome')}}">Home</a></li>
                <li>Daily Readings</li>
            </ol>
        </div>

    </div>
    </section><!-- End Breadcrumbs Section -->


    <!-- =======Daily Readings Section ======= -->
    <section id="advanced-features">

        <div class="features-row section-bg" data-aos="fade-up">
          <div class="container">
            <div class="section-header">
                <h3 class="section-title">Daily Reading</h3>
                <span class="section-divider"></span>
                <div class="section-description">
                   <p id="Universalis_date"></p>
                   <p id="Universalis_day"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wow fadeInRight">
                        <h3>First reading</h3>
                        <p id="Universalis_Mass_R1.source"></p>
                        <p id="Universalis_Mass_R1.text"></p>
                
                        <h3>Responsorial psalm</h3>
                        <p id="Universalis_Mass_Ps.source"></p>
                        <p id="Universalis_Mass_Ps.text"></p>
                
                        <div id="Universalis_Mass_R2" style="display: none">
                            <h3>Second reading</h3>
                            <p id="Universalis_Mass_R2.source"></p>
                            <p id="Universalis_Mass_R2.text"></p>
                        </div>
                
                        <h3>Gospel reading</h3>
                        <p id="Universalis_Mass_G.source"></p>
                        <p id="Universalis_Mass_G.text"></p>
                
                    </div>
                </div>
            </div>
          </div>
        </div>
    </section><!-- End Section -->
</main><!-- End #main -->
@endsection
