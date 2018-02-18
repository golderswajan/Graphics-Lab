<?php
/**
 * Created by PhpStorm.
 * User: Swajan
 * Date: 2/15/2018
 * Time: 5:24 PM
 */
include_once './layout/header.php';
?>
<style>
    td{
        background: #D1CECD;
        width: 34px;
        height: 34px;
        border: 2px solid black;
        font-size: x-small;
        text-align: center;
    }
</style>

<script>

    var size = 19;
    var offset = size-1;

    $(document).ready(function(){

        for(var i=0;i<=offset;i++){
            $('#cel'+i+'x0').css('background-color','#00BCD4');
            $('#cel'+'0x'+i).css('background-color','#00BCD4');

//            $('#cel'+i+'x0').html(i);
//            $('#cel'+'0x'+i).html(i);
        }
    });
    function showResult(){
        var r= $('#inputY').val();
        if(r>offset) {
            alert("Radious is beyound our dimension. Please use Radius less than "+(offset+1));
            return;
        }
        var x=0,y=r,d=3-2*r;

        while(x<=y){
            plotPixel(x,y);
            if(d<0){
                d += 4*x+6;
            }else{
                d+= 4*(x-y)+10;
                y--;
            }
            x++;
        }
    }


    function plotPixel(x,y){
        $('#cel'+x+'x'+y).css('background-color','#E91E63');
        $('#cel'+x+'x'+y).html(x+','+y);
    }

</script>

<div>
    <table>
        <?php
        $size = 19;
        $offset = $size-1;
        $html='';
        for($i=0;$i<$size;$i++){
            $html .= "<tr>";
            for($j=0;$j<$size;$j++){
                $positionHtml = ($j).",".($offset-$i);
                $positionHtml = '';
                if($j==0)$html .="<td style='background: transparent;border: none'>".($offset-$i)."</td>";
                $html .= "<td id=\"cel".($j)."x".($offset-$i)."\">".$positionHtml."</td>";
            }
            $html .= "</tr>";
        }
        $html .= "<tr>";
        for($j=0;$j<=$size;$j++){
            if($j==0)  $html .="<td style='background: transparent;border: none'></td>";
            else $html .="<td style='background: transparent;border: none'>".($j-1)."</td>";
        }
        $html .= "</tr>";
        echo $html;
        ?>
    </table>
</div>
<div style="margin-top: 20px;margin-left: 30px">
    <div class="row">
        <div class="col-md-3"><input type="number" id="inputY" class="form-control" placeholder="Please Input Radius" min="0"></div>
        <div class="col-md-2"> <input type="button" value="Show Result" onclick="showResult()" class="btn btn-success"></div>
    </div>



</div>

<?php
include_once './layout/footer.php';
?>
