@extends('mainPage')

@section('title')
About Us Page
@endsection

@section('content')

<div class="main">
            <h1 class="mainHeading">About Us</h1>
            <img src="{{url('images/about.jpg')}}" class="img">
            <div>
            <h3 class="heading">Welcome to my vibrant world of creativity! </h3>
            <p class="p">
            I'm a painter, illustrator, character designer, and graphic artist with a lifelong passion for art. Since I was a young child, I've been captivated by the magic of drawing, and it has been my constant companion ever since.
            With over 20 years of professional experience as an illustrator, I've had the privilege of working with various publishers, advertising agencies, and gifts companies, bringing my unique artistic vision to life. I've also enjoyed collaborating with clients on diverse projects.
            </p>
            <p class="p">
            In 2017, I fulfilled a lifelong dream by opening my own art studio. It has become a haven for my creativity, a place where I can explore new artistic horizons and push the boundaries of my imagination. But my journey doesn't stop there—each day brings new opportunities for growth, and I am excited to see where my artistic path leads me.
            Art is more than just a job for me; it's a way of life. Whether I'm working on a commissioned project or indulging in my personal creations, the joy of creating art never fades. Every stroke of the pencil, every splash of color, is an expression of my love for this craft.
            </p>
            <p class="p">
            I have grand ambitions for my art and numerous projects swirling in my mind, waiting to be brought to life. My ultimate goal is to share my passion and creations with people like you, connecting through the power of art. It is my firm belief that art has the ability to inspire, evoke emotions, and spark conversations.
            </p>
            <p class="p">
            Thank you for joining me on this artistic journey. I invite you to explore my portfolio, where you'll find a collection of my illustrations, paintings, and designs. Whether you're interested in collaborating on a project or simply want to appreciate the beauty of art, I hope my work resonates with you and brings a touch of magic to your day.
            </p>
            <p class="p">
            Let's create something extraordinary together!
            </p>
            </div>
            </>
            </div>

@endsection


<style>
    .main{
    position: relative;
    margin: 20px auto;
    width:80vw;
    display: flex;
    column-gap: 10px;
    flex-direction: column;
    justify-content: center;
}
.img{
    
    width:200px;
    height:200px;
    margin-bottom: 40px;
}
.p{
    margin:0;
    padding:0;
    margin-bottom: 10px;

}
.heading{
    text-transform: capitalize;
    color: darkslategray;
    font-size: 32px;
    margin-bottom: 10px;
}
.mainHeading{
    text-transform:uppercase;
    color: darkslategray;
font-size: 46px;
    margin-bottom: 10px;
text-align: center;
margin-top: 40px;

}
</style>

