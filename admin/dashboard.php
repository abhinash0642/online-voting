<?php
    include 'masterfile/header.php';
    
    include 'masterfile/sidebar.php';
    titlename("Admin Dashboard");
?>




<h1 class="pagetitle">Dashboard </h1>
<div class="datemsg">
    <?php
          echo "Today:  ".date("d-m-Y");
           ?>
</div>
</div>
<!-- page Title ended     -->
<style>
.checkflex {
  width:100%;
    display: flex;
    align-items: center;
    margin-right:1rem;
    justify-content: space-between;

}
.allinfo {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;

        }

        .panel-content {
            width: 24%;
            height: 12rem;
            background:grey;
        }
        .panel-content:nth-child(1){
background:aquamarine;
        }
        .panel-content:nth-child(2){
          background: darkorange;
        }
        .panel-content:nth-child(3){
          background: cornflowerblue;
        }
        .panel-content:nth-child(4){
          background: deeppink;
        }

        .countrows {
            padding: .5rem 1rem;
            font-size: 2.5rem;
        }

        .iconimg {
            width: 40px;
            height: 40px;
        }

        .dashtitle {
            padding: 1rem 1rem;
            font-size:2.5rem;
        }
        .panelbody{
          margin-bottom:1.5rem;
        }
</style>

<div class="mainpanel">
    <div class="panelbody">
        <div class="allinfo">

            <div class="panel-content">
                <div class="checkflex">
                    <?php
        $sql = " SELECT * FROM voters";
        $result = mysqli_query($con,$sql);
        if($result){
          $rowcount = mysqli_num_rows( $result );
          ?>
                    <h1 class="countrows"><?php echo $rowcount ?></h1>
                    <?php
        }
        ?>


                    <div><img src="data:image/png;base64,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"/>
                  </div>
                </div>
                <h2 class="dashtitle">Registered Voters</h2>
            </div>


            <div class="panel-content">
                <div class="checkflex">
                    <?php
        $sql = " SELECT * FROM elections where status = 'active' ";
        $result = mysqli_query($con,$sql);
        if($result){
          $rowcount = mysqli_num_rows( $result );
          ?>
                    <h1 class="countrows"><?php echo $rowcount ?></h1>
                    <?php
        }
        ?>
                    <div><img
                            src="data:image/png;base64,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" />
                    </div>
                </div>
                <h2 class="dashtitle">Active Elections</h2>
            </div>
            <div class="panel-content">
                <div class="checkflex">
                    <?php
        $sql = " SELECT * FROM politicalparty";
        $result = mysqli_query($con,$sql);
        if($result){
          $rowcount = mysqli_num_rows( $result );
          ?>
                    <h1 class="countrows"><?php echo $rowcount ?></h1>
                    <?php
        }
        ?>
                    <div><img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABmJLR0QA/wD/AP+gvaeTAAAUHElEQVR4nO1baXRUx5X+qt7ae0utpVsLAsSOlyAWIWyE2GQDNtiO7Rlnw0k8mZN4yByHGAuwGTnY2ImXTJbxmczkJPFxnDixHQJmMWaTMfseAzZmFSDREpK6W0tvr997NT+EuvupW2oJe04yE3/n9Dl691Xduve+qlv33ioBn+Nz/F2D/O+wraVV5bEpOtNHE0KuRiAeOHCgtmMwHMrLa+0ylHLGWAEl9JO6A8JBoFb/rCX9zA0we1rNZNnEbbJna1mCqHKaSlm7X+jSVLpi847VPx8Ijztnrvyu3W55ZlJ5idXhNJOGyz7t9Cmv39fWNX/73ucPfZbycr0J1bd833K+eW/sRphVlj850mYn+4eMDDkcWSo1WXQ4sgiZPHWoFGhTb3O7KtrOX9p1tD8e86tW/XOe27Sm+u5i+6Qpo0hxSTbGjvfQm24tNJ89fe3LLuekP9Y37PbdiHwTJ9aavd46g26GGTDn9uU1HKc/pulkZySCFZkY8nqso+7IS609zwurn9zvGRouN5m1eJvi4mJkZWVBVRk2vHW5oUMhw+rqatX0An5LKHR5Ltx1/5AinifIzs7GkCFD4u8bLvvxu1f3739j7cqKHlrVxKU5KhXsmWSVZazhKJup6dyL2z5Y80Jch+RGlLK5I8YreY2n8OCsQu89PfSImQ/oHDEI7QvK0pVW+3kAU3tojOjjkpUHAIfD0T0QT1AwxGzxH+8oA3AwnZB2wVVWOMRs4fnu79Le3m54XzQkCxzlxifTbBZsKM5pK822RKIGXXjGy3bV2fN88COPWDgS5OxJ6U4A6Q0QZyqo5HtDD0lxQhnyYTO2Wfb6jLYuRfzXJBKhhKQsKUpp/G+zmRcJpzl7t4lDJ05J5uPjapoGxhgISUxUQeA4dM9cBgABRfrOcF5798n79hYaeMkAihKP/7Rqflp1aQplADh03q02+hxbdu5/7kASmekaQowZ20Yikfjfzd5wF1Ppib74Eo6cbGkOdfU8m0wmg/K6zhBV1CCuKw8AH+xfc/RSq2PrvrOFN+S3DCZhYFFdJyAwavGn46MQ4xO22nC0tLXN53g0lR19pcUrPpVXoMSlbm1tRVFREVqvReD3KRc/OLLG25cwO/Y927hg1qr61muRvJw8Gbm5uYb3Wzd9xCLhWMpOEvA5Hn3lvS/Mutxqc/fQBFnHfQ+cibchhEHXCRiYcakkP+iquLr+BK884D5tGGBMvg+j3P74z2FRKOHV/N6CvLOVe7rDJx5ubhAZu75j+3w+fHiskdW911TfHol8sS/lexAOa/fVvddUH2jjWFZWFgBAVXVsWPshO3qo/vDazatW9+5DeDXfbla4ZBnHFBo3ivvv+Bj1p3hFV0VDf8MM2L539b7Fc74TmJtzMS+ZPs7TimQf8LjtQN6KN2b8FsBkoyi1emd7zaPBsLSxqVF0yU6HpgSDVFNCAPinC4ovNmcygKvoTFPLlTFPv/P2J7/csqUelhyr3n7Fz4GjrVpE+w7Qa3oCyHZ2/mbpgkO5w/MCCaJsbFM9rR5vbxodeHXdj/b1aYCBoiSnA7eNbhilqEu/+s77L70GAHMmPuEgOXlbJUvOBEfeTbxkywfhOMqKdcRs7eg8+fFP247KK6smjby37vCak+n4VlY8cXNbwPEn54wx+faJYzl+pB0km3LOmIrI+Wt5He+e2Fdd9OKR9sau6p7Icv7tS79626hLYwzKDwIpkeC9lY99kmsK5STTwkRo1wDD/qbplAsrwun1dS/Nv+22ZTaTOffj3OHTC83OkgTnWwAkzSU10InGX69tVv3td9btXXM8md/0qSvKZJdjk+fr9+YLzqTpZgXgSUgaOnoJrb/e1RBrD42tq6vtWli1dJNJjI3hqG6Qj+PAmcwxRzKtxWduXbv9x6OTaSkzwBeWr67dZWyUCWZL/tuukvKE8gBQalQeAHinDYXfuC+/4Rdvvj1vxJJxm8/9LAoAVVW1Mi8KbxV+84v5nN1i7NQFoA3A9U9iLitBtjKtyP+Hg38EMH993UvzByrnjMnLd/am3dA2mIzKySuLecFcackuTRAlAEPTt+cdVjjKb3aHPFlfixM1POyo+EKq8j3wA0gKw6xTS0Ht0qxZFSsL03cYOD61ASS76SFb3hjJQMxBv2mWvWysWTCbvt7zzJmkxdayMeY+OzAAwV48ZoyViNP8jzciczI+tQGIaJ0uml1GYh8fsgeczQKAxfdsQkg+b+lbfwCAYnwUS1zgrebpgxA1LQa9C8wbsUQiQ6yPE0oeASNytLPNpkY7IVmTgpYMXNXOIPSIkrNgzqqPASAcieSonUHwtn4s16sSoPqCYK2BuQ8uXNOkaVosGlV/6/WT1UeO1IYGo8+gDDB94goPl0UPZ+VGC7JyVVDKoEQ5tDa9j85wM2xFFRl5RC9eQcc72zFrtsvmKbSMAQBvQxAHf/0mbHfPgTysKBMLdPxhL+QPL+B7y2aa8/LtZkXRsH/PhZod751+xFa+bELdgR81DFSnQS0Bm4O87ykJF7jyY6C0Ox4ZMbIQd97thqSdQ8R/qd/+WjiK9vXbMH9+LgqKLCAEIAQoKLZgwfxctK/bCj2s9MsjfPQiTCcvYOZMF8IRPwBAFDlUzhyJxY9U5DizrSmevj+kGIBC/5d0DaeXr7jFbNOGWmyJ7VaSpHi6O60yC13etFluHMFDJzDhVhtEMdXugkgx4VYbgkc+7JdH6M+HUFHenVD6/X5Eo4nQflhpDkqGZpdUTqqZkK5vOt1SJNl56Ien0nXmgUlmqyok05KzNUnmQEn/X0+76kWeW+rzfb5bgtrQZ64EACBKDJKcyLpDIeOSHzUmX6ACKUvXN51uA/cBDM1MJwxJGxzrlftGQmGt4cRbEXZKCzGqpVhDD7TnaOML+7SApjG0n2mMdv70d6293xGRE4nMmTl/REZSKS+53gAAiqIxprEBO8IBG4ASHA74eMWVH4srEAwG4wULX2sUhCk7tmxaUt0Xj+rbn/rGhXMdP791osuU7v2Fsx1haNq3t65f+mpfPBbMfmqrvy06J8slgRACiyWxczDGcOzw5SjHcbsGrNdAG24/sKZZj5GNrU1i/LOrqgqv14toVMeubd62cDtb0h+PtnDza2c+6rja1hJJfdcSxSenAo2aILzeH49gQF2ya5u3LRrVUFBQAJ5PfMOdWz9hwc7Ixh37nm0cqF4pJaz+UFgy+096GJM7AvxQwjFOUwmaryrs2MEufySsPbTjwLP9ekGv94ieXzj1rasXwvODnTGJ46nU1anio7/4O44f8l0Iduozd+1b3e/5Qb13d+uQwunHL50LLrDZbTJjIA1XAnj7jaOxM6ebt/hC+v319XUDPj8YlAGGe6Yu0llssaZppmhEZV2dOgt1MUWNkRABnIW5lXsvez/o6qv/vBFLJGYWljCw8mAorLc2B6KNDYGQzxeNKIpOKceY2T7nQEtLndYXj+kTV3h4Qa9RdXVIwN/OXbncTC6ea9IDvqCmKDGrFoudv3h59+m++vfGAA9Gamn19NBGwRSZa8/2c5TrNrDJZILFYgEhBJ3tVL9yXmzWNPrl7XvWpOzFVZMfd3MSt91dqA7Lcasm0mtkxoCWJj58rVG4yGJk1vYDa1KKJzMrls0WBPJacWnMbXPohFIKj8cDl6s7FI+ENRze16I1NwXf3bhNWDiQk6QBzYC5lZPeMNu7FtpdAUquB0BmsxlWqzVpG2QkO0+z+a7ReYWe2zZeatgT9+TzRiyR4JQOlI5RxjhdmtBbeaA7ILLYdMFi03MCfnqXyTbnv5NnwszJT4wXZbJ+9C2KWzYz0m00hs7OTnAcB7PZDF6gGDLMSjWVjMx1hEadubDr7Uy6ZXSClZNqJvCCdq/V2REXm+d5mM2pyQvHMZSOi+WJAjU4slie9Ul3kVpituoZZ5zFphN3YWy42xlemUznJfL68LFKHsenVMSuO+JEQHTzhCxitYv3Ty9fcUum8TIaQDZrL1mzAoYASJZlQ7k6GZKsw2zWC6eXLx/XQyMcezjHrcppO6SBy61JlNJ4ulw1acVNZqvukeRU5YHumdDW1magTZicI2Q5uZcyjTWQbfBWUTLGNIIg9NG0G84cLUcg+mwAqJzy5DCTRR9U0kUIIFs0oWpqTXdZhVPnOHO03P76dHUZfa8rVwJjSBsRJiOjARjRxZROtP9uosQoFciobgbMI0ro32JpIMlMZDrxAAAnkBGCyPpdPopi/EiEEHAcSZG9NzIagCB1rvc1/RPvATBcH1zlKWGDLrxQgDCmC9dlSOs4B4CMvW6oLJ4JaoyAgN61YM7Kc7oKJaaqgx5H1Tg+P9/xn1954AXR19opq7EbOvnKiM/cAC1eCV0dFMPHRgokWUcsRtAVsLJLZzkUl4bjdYS+oOsE3ks2lE0YaZ23sGys3S7jamMAb/x2Lzr9LbBlDeqiSUZ86ppgMjr8PCIhgmGjwzBZdFAOyHaZUTV3KBl3Ux6armTeCNq8Vsy9cwIW3HsTcWbJkGQBw0pzUbNqIXKyh6CrI+OyHhQyzgDGCI1FjYOGgzStH2htElEyMmygud1uEEJQOtqOM6f96OqIgusj/NI0QBCsmFReAsYYQqFQvOBCCMHD35qBZ1a1gONaUvoSQtA7ydK1zL4nswF0vBm4llOcTPM3cQGAGOYyYxovW1DN8czwmZMDJk+hJXTyWPQEx5G02ZqmscK58wtuBmAGgFivdW+xSBAFKXL+I/49Qrhet0wYuVrvNdw90DT9cib9DAaYfdtT0wlR/p1Af3Hr7hd+DwDbdr+wOBOT6yB337Gi00DoNUuYTlSdoWbH7ufq0jGYUb5ipq6zdX31BwDKUW3bnh/dgzSHpP1h7u2PP8RAv69r/JId+57d20M3GICjsRXDxylll0/Iv/n61JqXe+gRik6NUoPFGdOpwsiJdXufeyCun4bWmEIswvWSAWMMXV1dsNlsYIzhcn1XCBHZcCaYDE3Qj5/8izd4513jbYSQlIDL7w9Ciagtycovmrb8TZGwmwmhhsSHozovC4kz7eYoyR4yPiJe+Ig8BWBeWgOAQOQ4wEWY+LOIFj+4wGi4YTFmqK81067NARguKwS7lEca6+XNJSPDfM/H83q9sFqtOHU8EFEVtrbu+NN9HuPu3v28f1H16nV1284unlU9Wk5ePqqq45ev7FRbmjoeSe4TY6TujixW/bX8mPGilAwgcb8K397J4frlGoNDu6FdwKsAWwO0fv2e5/8jmV63/8VtkTBZdu6UKdrh5xCNELS1KNiyvj5y+mRgk9n1cb8VIwAQHR8+umvH2Xdf/9WhyMVzrWhuaseRgxdRW/NW9Fpz5+PvfvCD7cntN+1b88q2AK54+6/H9okBxQFXYkA0nFiPv/DSVp9Cvope63D2lOUum90yKaboihZ1IqZTTtOZHospYVFi1uaG4eMA9HlHCACaLo8c73IyS/3F1vC6t49QXqA0EolpoZCiiDI/qaKiNnvfvtrk6x/Mp9CvvNyILf/s1uPn0RIYitPw79cAusY2N30sTrtZN3ryLZ0UkWDCAE0K0cSocja5TXXlk7McTnnd1NsLrMNKnSCkO23OycmBJEmit7G9+g+vH9nhtP3gJ+vfW/VMOmHmz3r63/LyrI8++JWyXHeBAzzPw263g1LK6zqTjh+p//IfXz+w0FVVu3BDXW3ckYpR5WyTILB3fYkJLYsMj4xKuIVSB8OJM2JE07EpeUzDjnzhyp69UzzTv/tMWLck+9+yYoYpLoYp9u5ftgDxVIzP+/jK7g1A982O/Hxb3T0PjjLn5ptBCMBxHDweT9yR2ewyplQMNV9taC/Ltk+Knr1Qtz957AWzn1469ib3sm9+e5rLZu+2v67riEajEEURHEfhKcxC+bRS6fixy/+QZfrCn+uv7mkBgFtHVv3km26t4sFcne+RsczFgKTrERVuhm3nqW/t+8/flzxuqg9gmTOIKocu5gnsvsqpy8YCQG62bfO8RaWybEpMKJfLBa5XxEMpwUOLJzutFqlm+sQVnji/8mVFNrv8/S8tnuSk1Di6rusIBhNn4za7CUuW3mFyF7k2A0Dl1GVjcznti1UO1veJC5AmpetGig+IEhL7lWQMMpQ2BPR2GGhmCslO6X9Vla98vKjElm+zJ5yrKIowmdKW/kEpwYJ7bsp98/fHvgfgcQCw262PLVg0Pr+vLFNRFKiqGi+B5+bZMGqM2zNjcs1kG8XLFg7CK1e5JsM4PHjRD0NgFNVJSkaVYgCvRs6vJWyRgdjZu1U3Yjr8+fnyd4cOdxj49KV8D8aM91BKj83HdQMQDneOHpufMd9PPgOYOGUY/8lHVx9quBpYfExDVu8LFACAXhGzzsjLvZuk7gKM6TsPPn+kXw2S8KX7nhuf/PUBpEz9lEF5Co7j4ps8x3FmXui/T+9juJxcGySZv3n3oecvDFTWGZOXp1SJP3U2yBgkyhk/XqaCCQCQJFdDBlC46G0AjqcghPa77geCzzQd/r+Izw3w1xbgr424Eywvr7ULQoRjMQi3316TNVAGjDFeiWqIRBK7ZDgcA6X9B+c6Y7RnHJ0xGgplaK9TEJI4/IiEY9A0jR+UrNd1i8VkreeqbY/zITOmLH8VIAM+vOiBKHHm7GyTIexWNRZSY3q/GkUisWAkrHYBgGzirbIs9Hu5ThR5UZJ4w3FUy7XOK5GIOqhbYd3Qw+8ffP5hDLKm8P8S8e1nZvkTi3SWOEgghLAojWzct+/H4aopy+9iYP1HN39jICDhuoPPbaioeMwk6fICxhIHK5QwZeeBH64DEj6AMJ3LAk2cAjEdTDI5uqMTRpygLMNVzr8x6EQCAElycCwYzQJNutukcwqS/u/oc3yOv2P8D5NY0ir0HltoAAAAAElFTkSuQmCC" />
                    </div>
                </div>
                <h2 class="dashtitle">Political Parties</h2>
            </div>
            <div class="panel-content">
                <div class="checkflex">
                    <?php
        $sql = " SELECT * FROM applicants";
        $result = mysqli_query($con,$sql);
        if($result){
          $rowcount = mysqli_num_rows( $result );
          ?>
                    <h1 class="countrows"><?php echo $rowcount ?></h1>
                    <?php
        }
        ?>
                    <div><img
                            src="data:image/png;base64,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" />
                    </div>
                </div>
                <h2 class="dashtitle">Approval Pending</h2>
            </div>
        </div>
        <style>
        .panelbody img{
          display:block;
          width:70%;
          margin:0 auto;
        }
        </style>
    </div>
    <div class="panelbody">
        <img src="../images/map.gif" alt="map" />
    </div>

</div>




<!-- ============================================================== -->
<?php
    include 'masterfile/footer.php';
    ?>