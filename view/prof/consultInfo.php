<form method="post" action="<?= BASE_URL ?>/etudiant/info/<?= SESSION::get('code') ?>"><!-- Formulaire de consultation des informations d'un etudiant -->
    <div>
        <h3>Renseignements généraux</h3>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <td>
                    <label for="e_nom">Nom :</label>
                </td>
                <td>
                    <input type="text" id="e_nom" name="e_nom" value="<?= $etu->e_nom ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_prenom">Prenom :</label>
                </td>
                <td>
                    <input type="text" id="e_prenom" name="e_prenom" value="<?= $etu->e_prenom ?>" disabled="disabled">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_age">Age :</label>
                </td>
                <td>
                    <?php if (isset($etu->e_age)) : ?>
                        <input type="text" id="e_age" name="e_age" value="<?= $etu->e_age ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="e_age" name="e_age" placeholder="age" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_regime">Régime :</label>
                </td>
                <td>
                    <select id="e_regime" name="e_regime" disabled="disabled">
                        <?php if ($etu->e_regime == "Externe") : ?>
                            <option value="Externe" selected="selected">Externe</option>
                        <?php else : ?>
                            <option value="Externe" >Externe</option>
                        <?php endif; ?>
                        <?php if ($etu->e_regime == "DP") : ?>
                            <option value="DP" selected="selected">Demi-pensionnaire</option>
                        <?php else : ?>
                            <option value="DP">Demi-pensionnaire</option>
                        <?php endif; ?>
                        <?php if ($etu->e_regime == "Interne") : ?>
                            <option value="Interne" selected="selected">Interne</option>
                        <?php else : ?>
                            <option value="Interne">Interne</option>
                        <?php endif; ?>
                        <?php if ($etu->e_regime == NULL) : ?>
                            <option value=NULL selected="selected">Aucun</option>
                        <?php else : ?>
                            <option value=NULL>Aucun</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_ville">Ville de résidence :</label>
                </td>
                <td>
                    <?php if (isset($etu->e_ville)) : ?>
                        <input type="text" id="e_ville" name="e_ville" value="<?= $etu->e_ville ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="e_ville" name="e_ville" placeholder="ville" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_tempstrajet">Temps de trajet :</label>
                </td>
                <td>
                    <?php if (isset($etu->e_tempstrajet)) : ?>
                        <input type="text" id="e_tempstrajet" name="e_tempstrajet" value="<?= $etu->e_tempstrajet ?>" disabled="disabled"> minutes</input>
                    <?php else : ?>
                        <input type="text" id="e_tempstrajet" name="e_tempstrajet" placeholder="nombres" disabled="disabled"> minutes</input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_isTravail">Avez-vous un travail rémunéré à l'extérieur :</label>
                </td>
                <td>
                    <?php if (isset($info->i_isTravail)) : ?>
                        <?php if ($info->i_isTravail == 1) : ?>
                            <input type="checkbox" id="i_isTravail" name="i_isTravail" value=1  checked="ckecked" disabled="disabled">
                        <?php else : ?>
                            <input type="checkbox" id="i_isTravail" value=1 name="i_isTravail" disabled="disabled">
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="checkbox" id="i_isTravail" value=1 name="i_isTravail" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_nbHSemaineTravail">Combien d'heures par semaine ?</label>
                </td>
                <td>
                    <?php if (isset($info->i_nbHSemaineTravail)) : ?>
                        <input type="text" id="i_nbHSemaineTravail" name="i_nbHSemaineTravail" value="<?= $info->i_nbHSemaineTravail ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_nbHSemaineTravail" name="i_nbHSemaineTravail" placeholder="Entrez nombre d'heure par semaine" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_intituleBac">Diplôme secondaire obtenu - BAC :</label>
                </td>
                <td>
                    <select id="e_intituleBac" name="e_intituleBac" disabled="disabled">
                        <?php if ($etu->e_intituleBac == "S") : ?>
                            <option value="S" selected="selected">S</option>
                        <?php else : ?>
                            <option value="S">S</option>
                        <?php endif; ?>
                        <?php if ($etu->e_intituleBac == "STMG") : ?>
                            <option value="STMG" selected="selected">STMG</option>
                        <?php else : ?>
                            <option value="STMG">STMG</option>
                        <?php endif; ?>
                        <?php if ($etu->e_intituleBac == "ES") : ?>
                            <option value="ES" selected="selected">ES</option>
                        <?php else : ?>
                            <option value="ES">ES</option>
                        <?php endif; ?>
                        <?php if ($etu->e_intituleBac == NULL) : ?>
                            <option value=NULL selected="selected">Aucun</option>
                        <?php else : ?>
                            <option value=NULL>Aucun</option>
                        <?php endif; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_anneeBac">Année d'optension :</label>
                </td>
                <td>
                    <?php if (isset($etu->e_anneeBac)) : ?>
                        <input type="text" id="e_anneeBac" name="e_anneeBac" value="<?= $etu->e_anneeBac ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="e_anneeBac" name="e_anneeBac" placeholder="Entrez l'année de l'optension du bac" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="e_etablissementBac">Etablissement :</label>
                </td>
                <td>
                    <?php if (isset($etu->e_etablissementBac)) : ?>
                        <input type="text" id="e_etablissementBac" name="e_etablissementBac" value="<?= $etu->e_etablissementBac ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="e_etablissementBac" name="e_etablissementBac" placeholder="Entrez l'établissement" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <h3>Intérêt pour la formation BTS SIO</h3>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <td>
                    <label for="i_numChoix">Le BTS SIO était votre choix n°: </label>
                </td>
                <td>
                    <?php if (isset($info->i_numChoix)) : ?>
                        <?php if ($info->i_numChoix == 1) : ?>
                            <input type="radio" id="i_numChoix" name="i_numChoix" value=1 checked="checked" disabled="disabled"> 1  </input>
                        <?php else : ?>
                            <input type="radio" id="i_numChoix" name="i_numChoix" value=1 disabled="disabled"> 1  </input>
                        <?php endif; ?>
                        <?php if ($info->i_numChoix == 2) : ?>
                            <input type="radio" id="i_numChoix" name="i_numChoix" value=2 checked="checked" disabled="disabled"> 2  </input>
                        <?php else : ?>
                            <input type="radio" id="i_numChoix" name="i_numChoix" value=2 disabled="disabled"> 2  </input>
                        <?php endif; ?>
                        <?php if ($info->i_numChoix == 3) : ?>
                            <input type="radio" id="i_numChoix" name="i_numChoix" value=3 checked="checked" disabled="disabled"> 3  </input>
                        <?php else : ?>
                            <input type="radio" id="i_numChoix" name="i_numChoix" value=3 disabled="disabled"> 3  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_numChoix" name="i_numChoix" value=1 disabled="disabled"> 1  </input>
                        <input type="radio" id="i_numChoix" name="i_numChoix" value=2 disabled="disabled"> 2  </input>
                        <input type="radio" id="i_numChoix" name="i_numChoix" value=3 disabled="disabled"> 3  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_motivChoix">Motivations :</label>
                </td>
                <td>
                    <?php if (isset($info->i_motivChoix)) : ?>
                        <input type="text" id="i_motivChoix" name="i_motivChoix" size="100" value="<?= $info->i_motivChoix ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_motivChoix" name="i_motivChoix" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            <tr>
                <td>
                    <label for="i_Option">Option envisagée : </label>
                </td>
                <td>
                    <?php if (isset($info->i_Option)) : ?>
                        <?php if ($info->i_Option == "SISR") : ?>
                            <input type="radio" id="i_Option" name="i_Option" value="SISR" checked="checked" disabled="disabled"> SISR  </input>
                        <?php else : ?>
                            <input type="radio" id="i_Option" name="i_Option" value="SISR" disabled="disabled"> SISR  </input>
                        <?php endif; ?>
                        <?php if ($info->i_Option == "SLAM") : ?>
                            <input type="radio" id="i_Option" name="i_Option" value="SLAM" checked="checked" disabled="disabled"> SLAM  </input>
                        <?php else : ?>
                            <input type="radio" id="i_Option" name="i_Option" value="SLAM" disabled="disabled"> SLAM  </input>
                        <?php endif; ?>
                        <?php if ($info->i_Option == "Nsp") : ?>
                            <input type="radio" id="i_Option" name="i_Option" value="Nsp" checked="checked" disabled="disabled"> Ne sait pas  </input>
                        <?php else : ?>
                            <input type="radio" id="i_Option" name="i_Option" value="Nsp" disabled="disabled"> Ne sait pas  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_Option" name="i_Option" value="SISR" disabled="disabled"> SISR  </input>
                        <input type="radio" id="i_Option" name="i_Option" value="SLAM" disabled="disabled"> SLAM  </input>
                        <input type="radio" id="i_Option" name="i_Option" value="Nsp" disabled="disabled"> Ne sait pas  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_motivOpt">Motivations :</label>
                </td>
                <td>
                    <?php if (isset($info->i_motivOpt)) : ?>
                        <input type="text" id="i_motivOpt" name="i_motivOpt" size="100" value="<?= $info->i_motivOpt ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_motivOpt" name="i_motivOpt" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <h3>Expérience en informatique</h3>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <td>
                    <label for="i_nivPostedeTravail">Niveau utilisateur poste de travail : </label>
                </td>
                <td>
                    <?php if (isset($info->i_nivPostedeTravail)) : ?>
                        <?php if ($info->i_nivPostedeTravail == "novice") : ?>
                            <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="novice" checked="checked" disabled="disabled"> novice  </input>
                        <?php else : ?>
                            <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="novice" disabled="disabled"> novice  </input>
                        <?php endif; ?>
                        <?php if ($info->i_nivPostedeTravail == "standard") : ?>
                            <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="standard" checked="checked" disabled="disabled"> standard  </input>
                        <?php else : ?>
                            <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="standard" disabled="disabled"> standard  </input>
                        <?php endif; ?>
                        <?php if ($info->i_nivPostedeTravail == "avancé") : ?>
                            <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="avancé" checked="checked" disabled="disabled"> avancé  </input>
                        <?php else : ?>
                            <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="avancé" disabled="disabled"> avancé  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="novice" disabled="disabled"> novice  </input>
                        <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="standard" disabled="disabled"> standard  </input>
                        <input type="radio" id="i_nivPostedeTravail" name="i_nivPostedeTravail" value="avancé" disabled="disabled"> avancé  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <h5><strong>Connaissances / compétences en : </strong></h5>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_compMat">- matériels : </label>
                </td>
                <td>
                    <?php if (isset($info->i_compMat)) : ?>
                        <?php if ($info->i_compMat == "novice") : ?>
                            <input type="radio" id="i_compMat" name="i_compMat" value="novice" checked="checked" disabled="disabled"> novice  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compMat" name="i_compMat" value="novice" disabled="disabled"> novice  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compMat == "standard") : ?>
                            <input type="radio" id="i_compMat" name="i_compMat" value="standard" checked="checked" disabled="disabled"> standard  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compMat" name="i_compMat" value="standard" disabled="disabled"> standard  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compMat == "avancé") : ?>
                            <input type="radio" id="i_compMat" name="i_compMat" value="avancé" checked="checked" disabled="disabled"> avancé  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compMat" name="i_compMat" value="avancé" disabled="disabled"> avancé  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_compMat" name="i_compMat" value="novice" disabled="disabled"> novice  </input>
                        <input type="radio" id="i_compMat" name="i_compMat" value="standard" disabled="disabled"> standard  </input>
                        <input type="radio" id="i_compMat" name="i_compMat" value="avancé" disabled="disabled"> avancé  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_precMat">Précisions :</label>
                </td>
                <td>
                    <?php if (isset($info->i_precMat)) : ?>
                        <input type="text" id="i_precMat" name="i_precMat" size="100" value="<?= $info->i_precMat ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_precMat" name="i_precMat" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_compSyst">- systèmes(OS) : </label>
                </td>
                <td>
                    <?php if (isset($info->i_compSyst)) : ?>
                        <?php if ($info->i_compSyst == "novice") : ?>
                            <input type="radio" id="i_compSyst" name="i_compSyst" value="novice" checked="checked" disabled="disabled"> novice  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compSyst" name="i_compSyst" value="novice" disabled="disabled"> novice  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compSyst == "standard") : ?>
                            <input type="radio" id="i_compSyst" name="i_compSyst" value="standard" checked="checked" disabled="disabled"> standard  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compSyst" name="i_compSyst" value="standard" disabled="disabled"> standard  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compSyst == "avancé") : ?>
                            <input type="radio" id="i_compSyst" name="i_compSyst" value="avancé" checked="checked" disabled="disabled"> avancé  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compSyst" name="i_compSyst" value="avancé" disabled="disabled"> avancé  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_compSyst" name="i_compSyst" value="novice" disabled="disabled"> novice  </input>
                        <input type="radio" id="i_compSyst" name="i_compSyst" value="standard" disabled="disabled"> standard  </input>
                        <input type="radio" id="i_compSyst" name="i_compSyst" value="avancé" disabled="disabled"> avancé  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_precSyst">Précisions :</label>
                </td>
                <td>
                    <?php if (isset($info->i_precSyst)) : ?>
                        <input type="text" id="i_precSyst" name="i_precSyst" size="100" value="<?= $info->i_precSyst ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_precSyst" name="i_precSyst" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_compReseau">- réseaux : </label>
                </td>
                <td>
                    <?php if (isset($info->i_compReseau)) : ?>
                        <?php if ($info->i_compReseau == "novice") : ?>
                            <input type="radio" id="i_compReseau" name="i_compReseau" value="novice" checked="checked" disabled="disabled"> novice  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compReseau" name="i_compReseau" value="novice" disabled="disabled"> novice  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compReseau == "standard") : ?>
                            <input type="radio" id="i_compReseau" name="i_compReseau" value="standard" checked="checked" disabled="disabled"> standard  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compReseau" name="i_compReseau" value="standard" disabled="disabled"> standard  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compReseau == "avancé") : ?>
                            <input type="radio" id="i_compReseau" name="i_compReseau" value="avancé" checked="checked" disabled="disabled"> avancé  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compReseau" name="i_compReseau" value="avancé" disabled="disabled"> avancé  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_compReseau" name="i_compReseau" value="novice" disabled="disabled"> novice  </input>
                        <input type="radio" id="i_compReseau" name="i_compReseau" value="standard" disabled="disabled"> standard  </input>
                        <input type="radio" id="i_compReseau" name="i_compReseau" value="avancé" disabled="disabled"> avancé  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_precReseau">Précisions :</label>
                </td>
                <td>
                    <?php if (isset($info->i_precReseau)) : ?>
                        <input type="text" id="i_precReseau" name="i_precReseau" size="100" value="<?= $info->i_precReseau ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_precReseau" name="i_precReseau" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_compDev">- développement (languages, réalisation,...) : </label>
                </td>
                <td>
                    <?php if (isset($info->i_compDev)) : ?>
                        <?php if ($info->i_compDev == "novice") : ?>
                            <input type="radio" id="i_compDev" name="i_compDev" value="novice" checked="checked" disabled="disabled"> novice  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compDev" name="i_compDev" value="novice" disabled="disabled"> novice  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compDev == "standard") : ?>
                            <input type="radio" id="i_compDev" name="i_compDev" value="standard" checked="checked" disabled="disabled"> standard  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compDev" name="i_compDev" value="standard" disabled="disabled"> standard  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compDev == "avancé") : ?>
                            <input type="radio" id="i_compDev" name="i_compDev" value="avancé" checked="checked" disabled="disabled"> avancé  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compDev" name="i_compDev" value="avancé" disabled="disabled"> avancé  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_compDev" name="i_compDev" value="novice" disabled="disabled"> novice  </input>
                        <input type="radio" id="i_compDev" name="i_compDev" value="standard" disabled="disabled"> standard  </input>
                        <input type="radio" id="i_compDev" name="i_compDev" value="avancé" disabled="disabled"> avancé  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_precDev">Précisions :</label>
                </td>
                <td>
                    <?php if (isset($info->i_precDev)) : ?>
                        <input type="text" id="i_precDev" name="i_precDev" size="100" value="<?= $info->i_precDev ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_precDev" name="i_precDev" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_compWeb">- Publication web (CMS, HTML, Blog perso,...) : </label>
                </td>
                <td>
                    <?php if (isset($info->i_compWeb)) : ?>
                        <?php if ($info->i_compWeb == "novice") : ?>
                            <input type="radio" id="i_compWeb" name="i_compWeb" value="novice" checked="checked" disabled="disabled"> novice  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compWeb" name="i_compWeb" value="novice" disabled="disabled"> novice  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compWeb == "standard") : ?>
                            <input type="radio" id="i_compWeb" name="i_compWeb" value="standard" checked="checked" disabled="disabled"> standard  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compWeb" name="i_compWeb" value="standard" disabled="disabled"> standard  </input>
                        <?php endif; ?>
                        <?php if ($info->i_compWeb == "avancé") : ?>
                            <input type="radio" id="i_compWeb" name="i_compWeb" value="avancé" checked="checked" disabled="disabled"> avancé  </input>
                        <?php else : ?>
                            <input type="radio" id="i_compWeb" name="i_compWeb" value="avancé" disabled="disabled"> avancé  </input>
                        <?php endif; ?>
                    <?php else : ?>
                        <input type="radio" id="i_compWeb" name="i_compWeb" value="novice" disabled="disabled"> novice  </input>
                        <input type="radio" id="i_compWeb" name="i_compWeb" value="standard" disabled="disabled"> standard  </input>
                        <input type="radio" id="i_compWeb" name="i_compWeb" value="avancé" disabled="disabled"> avancé  </input>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_precWeb">Précisions :</label>
                </td>
                <td>
                    <?php if (isset($info->i_precWeb)) : ?>
                        <input type="text" id="i_precWeb" name="i_precWeb" size="100" value="<?= $info->i_precWeb ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_precWeb" name="i_precWeb" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_LSP">Logiciels spécifiques pratiqués (CAO, DAO, audio, vidéo,...) :</label>
                </td>
                <td>
                    <?php if (isset($info->i_LSP)) : ?>
                        <input type="text" id="i_LSP" name="i_LSP" size="100" value="<?= $info->i_LSP ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_LSP" name="i_LSP" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_ProjPro">Projet professionnel :</label>
                </td>
                <td>
                    <?php if (isset($info->i_ProjPro)) : ?>
                        <input type="text" id="i_ProjPro" name="i_ProjPro" size="100" value="<?= $info->i_ProjPro ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_ProjPro" name="i_ProjPro" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_pointsforts">Les points forts qui pourraient faciliter la réalisation de votre projet :</label>
                </td>
                <td>
                    <?php if (isset($info->i_pointsforts)) : ?>
                        <input type="text" id="i_pointsforts" name="i_pointsforts" size="100" value="<?= $info->i_pointsforts ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_pointsforts" name="i_pointsforts" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="i_obstacles">Les obstacles possibles à la réalisation de ce projet :</label>
                </td>
                <td>
                    <?php if (isset($info->i_obstacles)) : ?>
                        <input type="text" id="i_obstacles" name="i_obstacles" size="100" value="<?= $info->i_obstacles ?>" disabled="disabled">
                    <?php else : ?>
                        <input type="text" id="i_obstacles" name="i_obstacles" size="100" disabled="disabled">
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</form>
<br>

