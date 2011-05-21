<?php
    #Carregando o estilo referente ao banco, caso ele tenha
    if(!empty($OB->Layout->css))
        $OB->Template->addStyle($OB->Layout->css);
    
    //$OB->Template->addStyle('bb');
    
//pr($OB, 'addstyle');
?>
<div id="ficha_compensacao">
    <!--  cabecalho  -->
    <div id="cabecalho">
        <div class="cabecalho banco_logo "></div>
        <div class="cabecalho banco_codigo "><?php echo $OB->Vendedor->Banco . '-' . Math::Mod11($OB->Vendedor->Banco)?></div>
        <div class="cabecalho linha_digitavel  last"><?php echo $OB->linhaDigitavel();?></div>
    </div>
    
    <div id="colunaprincipal" class="">
        <!--  linha1  -->
            <!--local de pagamento-->
            <div class="local_pagamento item">
                 <label>Local de Pagamento</label>
                 Pagável em qualquer banco até o vencimento
            </div>
        
        <!--  linha2  -->
            <!--Cedente-->
            <div class="cedente item ">
                 <label>Cedente </label>
                 <?php echo $OB->Vendedor->Nome; ?>
            </div>
        
        <!--  linha3  -->
        <div class="linha">
            <!--data emissao-->
            <div class="data_doc item">
                <label>Data do documento</label>
                 <?php echo $OB->Boleto->DataEmissao; ?>
            </div>
            <!--numdocumento-->
            <div class="num_doc item">
                <label>Número do documento</label>
                 <?php echo $OB->Boleto->NumDocumento; ?>
            </div>
            <!--especiedocumento-->
            <div class="espec_doc item">
                <label>Espécie Doc.</label>

            </div>
            <!--aceite-->
            <div class="item aceite">
                <label>Aceite</label>

            </div>
            <!--data processamento-->
            <div class="item dt_proc">
                <label>Data proc</label>
                 <?php echo $OB->Boleto->DataEmissao; ?>
            </div>
        </div>
        
        <!--  linha4  -->
        <div class="linha">
            <!--uso do banco-->
            <div class="item uso_banco ">
                <label>Uso do Banco</label>
                
            </div>
            <!--carteira-->
            <div class="item carteira ">
                <label>Carteira</label>
                 <?php echo $OB->Vendedor->Carteira; ?>
            </div>
            <!--especie moeda-->
            <div class="item moeda ">
                <label>Espécie Moeda</label>
                R$
            </div>
            <!--quantidade-->
            <div class="item qtd ">
                <label>Quantidade</label>
                <?php echo $OB->Boleto->Quantidade; ?>
            </div>
            <!--valor-->
            <div class="item valor  last">
                <label>(x) Valor</label>
                <?php echo number_format($OB->Boleto->Valor/100,2,',','.'); ?>
            </div>
        </div>
        
        <!--  instrucoes/mensagens  -->
        <div class="mensagens ">
                 <label>Instruções (Texto de responsabilidade do cedente)</label>
        </div>
    
    </div>
    <!--Coluna direita-->
    <div id="colunadireita" class="">
        <div class="">
             <label>Vencimento</label>
             <?php echo $OB->Boleto->Vencimento; ?>
        </div>
        <div class="">
             <label>Agência / Código cedente </label>
             <?php
                echo $OB->Vendedor->Agencia . '-' . Math::Mod11($OB->Vendedor->Agencia)
                     . ' / ' .
                     $OB->Vendedor->Conta . '-' . Math::Mod11($OB->Vendedor->Conta)
                ;
                ?>
        </div>
        <div class="">
             <label>Nosso número</label>
             <?php
                echo $OB->Boleto->NossoNumero . '-' . Math::Mod11($OB->Boleto->NossoNumero)
                ;
                ?>
        </div>
        <div class="">
             <label>(=) Valor do documento</label>
             <?php echo !empty($OB->Boleto->Valor) ? number_format($OB->Boleto->Valor/100, 2, ',', '.') : ''; ?>
        </div>
        <div class="">
             <label>(-) Desconto/Abatimento</label>
             <?php echo $OB->Boleto->Desconto ? number_format($OB->Boleto->Desconto, 2, ',', '.') : ''; ?>
        </div>
        <div class="">
             <label>(-) Outras deduções</label>
             <?php echo $OB->Boleto->OutrosAbatimentos ? number_format($OB->Boleto->OutrosAbatimentos, 2, ',', '.') : ''; ?>
        </div>
        <div class="">
             <label>(-) Mora/Multa</label>
             <?php echo $OB->Boleto->Multa ? number_format($OB->Boleto->Multa, 2, ',', '.') : ''; ?>
        </div>
        <div class="">
             <label>(-) Outros Acréscimos</label>
             <?php echo $OB->Boleto->OutrosAcrescimos ? number_format($OB->Boleto->OutrosAcrescimos, 2, ',', '.') : ''; ?>
        </div>
        <div class="">
             <label>(=) Valor cobrado</label>
        </div>
    </div>
    
    <!--  sacado  -->
    <div id="sacado" class="">
        <div class="">
             <label>Sacado</label>
             <?php
                echo $OB->Cliente->Nome
                   . '<br>'
                   . 'CPF: ' . $OB->Cliente->Cpf
                   . '<br>'
                   . $OB->Cliente->Endereco
                   ;
             ?>
        </div>
    </div>
    
    <!--  codigo_barras  -->
    <div id="codigo_barras" class="">
        <label>Sacador/Avalista</label>
        <?php
           echo Barcode::getHtml($OB->geraCodigo());
        ?>
    </div>
    

<!--Encerra ficha de compensação-->    
</div>