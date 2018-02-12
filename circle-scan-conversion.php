<?php
/**
 * Created by PhpStorm.
 * User: Swajan
 * Date: 2/13/2018
 * Time: 1:33 AM
 */
include_once './layout/header.php';
?>
<style>
    td{
        background: #D1CECD;
        width: 44px;
        height: 44px;
        border: 2px solid black;
        font-size: x-small;
        text-align: center;
    }
</style>

<script>

    var size = 15;
    var offset = Math.floor(size/2);

    $(document).ready(function(){

        for(var i=-offset;i<=offset;i++){
            $('#cel'+i+'0').css('background-color','#00BCD4');
            $('#cel'+'0'+i).css('background-color','#00BCD4');
        }
    });
    function showResult(){
        var r= $('#input').val();
        if(r>offset) {
            alert("Radious is beyound our dimension. Please use Radius less than "+(offset+1));
            return;
        }
        var x=0,y=r,d=3-2*r;

        while(x<=y){
            plot(x,y);
            if(d<0){
                d += 4*x+6;
            }else{
                d+= 4*(x-y)+10;
                y--;
            }
            x++;
        }
    }

    function plot(x,y) {

        plotPixel(x,y);
        plotPixel(y,x);
        plotPixel(-y,x);
        plotPixel(-x,y);
        plotPixel(-x,-y);
        plotPixel(-y,-x);
        plotPixel(y,-x);
        plotPixel(x,-y);

    }

    function plotPixel(x,y){
        $('#cel'+x+''+y).css('background-color','#E91E63');
        $('#cel'+x+''+y).html(x+','+y);
    }

</script>

<div>
    <table>
        <?php
        $size = 15;
        $offset = floor($size/2);
        $html='';
        for($i=0;$i<$size;$i++){
            $html .= "<tr>";
            for($j=0;$j<$size;$j++){
                $positionHtml = ($j-$offset).",".($offset-$i);
//                $positionHtml = '';
                $html .= "<td id=\"cel".($j-$offset).($offset-$i)."\">".$positionHtml."</td>";
            }
            $html .= "</tr>";
        }
        echo $html;
        ?>
    </table>
</div>
<div style="margin-top: 20px">
    <div class="row">
        <div class="col-md-3"><input type="number" id="input" class="form-control" placeholder="Please Input Radius" min="0"></div>
        <div class="col-md-2"> <input type="button" value="Show Result" onclick="showResult()" class="btn btn-success"></div>
    </div>



</div>

<?php
include_once './layout/footer.php';
?>
