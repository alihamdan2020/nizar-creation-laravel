<div class="mainHeader">
<header>
        <a href="/"><img src="{{url('images/logo.png')}}" alt=""></a>
        <div class='burger'>
        <i class="fas fa-bars"></i>
        </div>
        <ul class='mainul'>
        <li><a href='/' class='a'>Home</a></li>
        <li><a  href="{{route('aboutus')}}" class='a'>About Us</a></li>
        <li>
            <a  onClick='showmenu()' class='portfolio'> Portfolio <i class="fas fa-sort-down" ></i> </a>
                <ul class='subul' id='subMenu' onClick='showmneu()'>
                @foreach ($allportfolio as $portfolio)
                    <li><a href="{{route('portfolio')}}#{{$portfolio->id}}" class="a">{{$portfolio->portfolioName}}</a></li>
                @endforeach 
                </ul>
        </li>
        <li><a href='./#services' class='a'>Services</a></li>
        <li><a href='/prices' class='a'>Prices</a></li>
        <li><a href="{{route('showBlogs')}}" class='a'>Blog</a></li>
        <li><a href='/contact' class='a'>Contact</a></li>
         </ul>
        
        </header>
        </div>
</header>
</div>
<style>
    .fas{
        cursor: pointer;
    }
</style>

<script>
    let arrow=document.querySelector('.fas');
   let showmenu=function(){
        let a=document.querySelector('.subul');
        if(a.style.opacity==0)
        a.style.opacity=1
        else
        a.style.opacity=0
  
      
    }

</script>