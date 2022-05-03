<?php

$resultados = '';
$resultados2 = '';
$parcela = 0;
$contador = 0;

if (!empty($xml->NFe->infNFe->cobr->dup)) {

   foreach ($xml->NFe->infNFe->cobr->dup as $dup) {

      $parcela = number_format((float) $dup->vDup, 2, ",", ".");

      $vencimento = $dup->dVenc;

      $resultados .= '<tr>
            <td>' . $titulo = $dup->nDup . '</td>
            <td class="caixa-alta">' . date('d/m/Y', strtotime($vencimento)) . '</td>
            <td class="caixa-alta ">R$ ' . $parcela . '</td>


            </tr>';
   }

   $resultados = strlen($resultados) ? $resultados : '<tr>
                                                     <td colspan="3" class="text-center" > Nenhuma resultado encontrado !!!!! </td>
                                                     </tr>';
}

if (!empty($xml->NFe->infNFe->det)) {
foreach($xml->NFe->infNFe->det as $item) 
	{
	   $contador += 1;
		$codigo = $item->prod->cProd;
		$xProd = $item->prod->xProd;
		$NCM = $item->prod->NCM;
		$CFOP = $item->prod->CFOP;
		$uCom = $item->prod->uCom;
		$qCom = $item->prod->qCom;
		$qCom = number_format((double) $qCom, 2, ",", ".");
		$vUnCom = $item->prod->vUnCom;
		$vUnCom = number_format((double) $vUnCom, 2, ",", ".");
		$vProd = $item->prod->vProd;
		$vProd = number_format((double) $vProd, 2, ",", ".");	
		$vBC_item = $item->imposto->ICMS->ICMS00->vBC;
		$icms00 = $item->imposto->ICMS->ICMS00;
		$icms10 = $item->imposto->ICMS->ICMS10;
		$icms20 = $item->imposto->ICMS->ICMS20;
		$icms30 = $item->imposto->ICMS->ICMS30;
		$icms40 = $item->imposto->ICMS->ICMS40;
		$icms50 = $item->imposto->ICMS->ICMS50;
		$icms51 = $item->imposto->ICMS->ICMS51;
		$icms60 = $item->imposto->ICMS->ICMS60;
		$ICMSSN102 = $item->imposto->ICMS->ICMSSN102; 
		if(!empty($ICMSSN102)) 
			{
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}		
		
		
		if (!empty($icms00))
		{
			$bc_icms = $item->imposto->ICMS->ICMS00->vBC;
			$bc_icms = number_format((double) $bc_icms, 2, ",", ".");
			$pICMS = $item->imposto->ICMS->ICMS00->pICMS;
			$pICMS = round($pICMS,0);
			$vlr_icms = $item->imposto->ICMS->ICMS00->vICMS;
			$vlr_icms = number_format((double) $vlr_icms, 2, ",", ".");
		}
		if (!empty($icms20))
		{
			$bc_icms = $item->imposto->ICMS->ICMS20->vBC;
			$bc_icms = number_format((double) $bc_icms, 2, ",", ".");
			$pICMS = $item->imposto->ICMS->ICMS20->pICMS;
			$pICMS = round($pICMS,0);
			$vlr_icms = $item->imposto->ICMS->ICMS20->vICMS;
			$vlr_icms = number_format((double) $vlr_icms, 2, ",", ".");
		}
			if(!empty($icms30)) 
			{
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}
			if(!empty($icms40)) 
			{
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}
			if(!empty($icms50)) 
			{
				$bc_icms = "0.00";	
				$pICMS = "0	";
				$vlr_icms = "0.00";
			}
			if(!empty($icms51)) 
			{
				$bc_icms = $item->imposto->ICMS->ICMS51->vBC;
				$pICMS = $item->imposto->ICMS->ICMS51->pICMS;
				$pICMS = round($pICMS,0);
				$vlr_icms = $item->imposto->ICMS->ICMS51->vICMS;
			}
		if(!empty($icms60)) 
		{
			$bc_icms = "0,00";	
			$pICMS = "0	";
			$vlr_icms = "0,00";
		}
		$IPITrib = $item->imposto->IPI->IPITrib;
		if (!empty($IPITrib))
		{
			$bc_ipi =$item->imposto->IPI->IPITrib->vBC;
			$bc_ipi = number_format((double) $bc_ipi, 2, ",", ".");
			$perc_ipi =  $item->imposto->IPI->IPITrib->pIPI;
			$perc_ipi = round($perc_ipi,0);
			$vlr_ipi = $item->imposto->IPI->IPITrib->vIPI;
			$vlr_ipi = number_format((double) $vlr_ipi, 2, ",", ".");
		}
		$IPINT = $item->imposto->IPI->IPINT;
		{
			$bc_ipi = "0,00";
			$perc_ipi =  "0";
			$vlr_ipi = "0,00";
		}	
      

      $resultados2 .= '<tr>

      <td>' . $contador . '</td>
      <td class="caixa-alta">  ' . $codigo . '</td>
      <td class="caixa-alta "> ' . $xProd  . '</td>
      <td class="caixa-alta "> ' . $NCM . '</td>
      <td class="caixa-alta "> ' . $CFOP . '</td>
      <td class="caixa-alta "> ' . $uCom . '</td>
      <td class="caixa-alta "> ' . $qCom . '</td>
      <td class="caixa-alta ">R$ ' . $vUnCom . '</td>
      <td class="caixa-alta ">R$ ' . $vProd . '</td>
      <td class="caixa-alta ">R$ ' . $bc_icms . '</td>
      <td class="caixa-alta ">R$ ' . $vlr_icms  . '</td>
      <td class="caixa-alta ">R$ ' . $vlr_ipi . '</td>
      <td class="caixa-alta "> ' . $pICMS . ' %</td>
      <td class="caixa-alta "> ' . $perc_ipi. ' %</td>


      </tr>';
}
}

$resultados2 = strlen($resultados2) ? $resultados2 : '<tr>
                                               <td colspan="14" class="text-center" > Nenhuma resultado encontrado !!!!! </td>
                                               </tr>';
   

?>
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="card back-black">
               <div class="card-header">
                  <div class="modal-body">
                     <form action="xml-list.php" method="post" enctype="multipart/form-data">
                        <div class="row">

                           <div class="col-4">

                              <input type="file" name="arquivo" class="form-control" value="" id="imagem" name="arquivo" ">
                    
                          </div>

                          <div class=" col-6">

                              <button type="submit" class="btn btn-primary">CARREGAR XML</button>

                           </div>

                        </div>
                     </form>
                  </div>

                  <div class="card-body caixa-alta ">
                     <div class="row">

                        <div class="col-12 info-nota"><span>DADOS DA NOTA FISCAL</span></div>

                        <div class="col-4">
                           </br>
                           <div class="form-group">
                              <label>Chave de Acesso da NFE </label>
                              <p>
                                 <span class="amarelo"><?php echo $chave ?></span>
                           </div>

                        </div>

                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Prot. Autorização de uso</label>
                              <p>
                                 <span class="amarelo"><?php echo $nProt ?></span>
                           </div>
                        </div>
                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Nº da Nota Fiscal</label>
                              <p>
                                 <span class="amarelo"><?php echo $nNF ?></span>
                           </div>
                        </div>
                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Série</label>
                              <p>
                                 <span class="amarelo"><?php echo $serie ?><span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-12 info-nota"><span>DADOS DO FORNECEDOR</span></div>

                        <div class="col-4">
                           </br>
                           <div class="form-group caixa-alta">
                              <label>Nome / Razão Social</label>
                              <p>
                                 <span class="amarelo"><?php echo $emit_xNome ?></span>
                           </div>

                        </div>

                        <div class="col-4">
                           </br>
                           <div class="form-group">
                              <label>CNPJ / CPF</label>
                              <p>
                                 <span class="amarelo"><?php echo $emit_CNPJ  ?></span>
                           </div>
                        </div>
                        <div class="col-4">
                           </br>
                           <div class="form-group">
                              <label>Inscrio Estadual</label>
                              <p>
                                 <span class="amarelo"><?php echo $emit_IE ?></span>
                           </div>
                        </div>

                     </div>

                     <div class="row">
                        <div class="col-12 info-nota"><span>TOTAIS</span></div>

                        <div class="col-2">
                           </br>
                           <div class="form-group caixa-alta">
                              <label>BC do ICMS</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vBC ?></span>
                           </div>

                        </div>

                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Valor do ICMS</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vICMS  ?></span>
                           </div>
                        </div>
                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>BC ICMS ST</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vBCST ?></span>
                           </div>
                        </div>
                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Valor do ICMS ST</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vST ?></span>
                           </div>
                        </div>
                        <div class="col-3">
                           </br>
                           <div class="form-group">
                              <label>Vl Total dos Produtos</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vProd ?></span>
                           </div>
                        </div>

                        <div class="col-2">
                           </br>
                           <div class="form-group caixa-alta">
                              <label>Valor do Frete</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vFrete ?></span>
                           </div>

                        </div>

                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Valor do Seguro</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vSeg  ?></span>
                           </div>
                        </div>
                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Desconto</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vDesc ?></span>
                           </div>
                        </div>
                        <div class="col-2">
                           </br>
                           <div class="form-group">
                              <label>Vl Total do IPI</label>
                              <p>
                                 <span class="amarelo">R$ <?php echo $vIPI ?></span>
                           </div>
                        </div>
                        <div class="col-3">
                           </br>
                           <div class="form-group">
                              <label>VL Total da Nota</label>
                              <p>
                                 <span class="prod-verde">R$ <?php echo $vNF ?></span>
                           </div>
                        </div>

                        <div class="col-12 info-nota"><span>FATURA / DUPLICADA</span>
                           <p>
                        </div>
                        <div class="col-12">

                           <table class="table table-dark table-hover table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th style="width: 30px;">PARCELAS</th>
                                    <th>DATA</th>
                                    <th style="text-align: esqueda; width: 200px;">VALOR</th>

                                 </tr>
                              </thead>
                              <tbody>
                                 <?= $resultados ?>

                           </table>

                        </div>

                        <div class="col-12 info-nota" style="margin-top: 30px;"><span>ITENS DA NOTA</span>
                           <p>
                        </div>
                        <div class="col-12">

                           <table class="table table-dark table-hover table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th>Nº</th>
                                    <th>CÓDIGO</th>
                                    <th>DESCRIÇÃO DOS PRODUTOS</th>
                                    <th>NCM</th>
                                    <th>CFOP</th>
                                    <th>UN</th>
                                    <th>QTD</th>
                                    <th>VL. UNI</th>
                                    <th>VAL. PRODUTO</th>
                                    <th>BC ICMS</th>
                                    <th>VL. ICMS</th>
                                    <th>VL. IPI</th>
                                    <th>% ICMS</th>
                                    <th>% IPI</th>

                                 </tr>
                              </thead>
                              <tbody>
                                 <?= $resultados2 ?>

                           </table>

                        </div>

                     </div>



                  </div>

               </div>



            </div>
            </form>

         </div>

      </div>

   </div>

</section>