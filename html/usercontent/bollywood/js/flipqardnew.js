var aLangKeys=new Array();

aLangKeys['en']=new Array();

aLangKeys['sv']=new Array();
aLangKeys['sv']=new Array();
aLangKeys['en']['Log in using SMS code']='Log in using SMS code';

aLangKeys['en']['To access your colleagues FlipQard, you need to verify your identity by filling in the SMS code you just received to the number your account is registered.']='To access your colleagues FlipQard, you need to verify your identity by filling in the SMS code you just received to the number your account is registered.';

aLangKeys['en']['Enter SMS code']='Enter SMS code';

aLangKeys['en']['online']='Online';

aLangKeys['en']['articles']='Articles >>';

aLangKeys['en']['js']='JavaScript';

aLangKeys['en']['php']='PHP';

aLangKeys['en']['html']='HTML';

aLangKeys['en']['css']='CSS';

aLangKeys['en']['contact_us']='Contact us';

aLangKeys['en']['welcome']='Welcome guests';

aLangKeys['ru']['home']='???????';

aLangKeys['ru']['peoples']='???????????? >>';

aLangKeys['ru']['all_list']='???? ??????';

aLangKeys['ru']['online']='? ????';

aLangKeys['ru']['articles']='?????? >>';

aLangKeys['ru']['js']='?????????';

aLangKeys['ru']['php']='???';

aLangKeys['ru']['html']='????';

aLangKeys['ru']['css']='???';

aLangKeys['ru']['contact_us']='???????? ???';

aLangKeys['ru']['welcome']='????? ??????????';

$(document).ready(function() {

    // onclick behavior

    $('.lang').click( function() {

        var lang = $(this).attr('id'); // obtain language id

        // translate all translatable elements

        $('.tr').each(function(i){

          $(this).text(aLangKeys[lang][ $(this).attr('key') ]);

        });

    } );
});
