<?php
/**
 * PHPWord
 *
 * Copyright (c) 2013 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 2013 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    0.7.0
 */

/**
 * PHPWord_DocumentProperties
 */
class PHPWord_Template
{

    /**
     * ZipArchive
     *
     * @var ZipArchive
     */
    private $_objZip;

    /**
     * Temporary Filename
     *
     * @var string
     */
    private $_tempFileName;

    /**
     * Document XML
     *
     * @var string
     */
    private $_documentXML;


    /**
     * Create a new Template Object
     *
     * @param string $strFilename
     */
    public function __construct($strFilename)
    {
        $this->_tempFileName = tempnam(sys_get_temp_dir(), '');
        if ($this->_tempFileName !== false) {
            // Copy the source File to the temp File
            if (!copy($strFilename, $this->_tempFileName)) {
                throw new PHPWord_Exception('Could not copy the template from ' . $strFilename . ' to ' . $this->_tempFileName . '.');
            }

            $this->_objZip = new ZipArchive();
            $this->_objZip->open($this->_tempFileName);

            $this->_documentXML = $this->_objZip->getFromName('word/document.xml');
        } else {
            throw new PHPWord_Exception('Could not create temporary file with unique name in the default temporary directory.');
        }
    }

    /**
     * Set a Template value
     *
     * @param mixed $search
     * @param mixed $replace
     */
public function setValue($search, $replace, $limit=-1) {
		if(substr($search, 0, 1) !== '{' && substr($search, -1) !== '}') {
			$search = '{'.$search.'}';
		}
		preg_match_all('/\{[^}]+\}/', $this->_documentXML, $matches);
		foreach ($matches[0] as $k => $match) {
			$no_tag = strip_tags($match);
			if ($no_tag == $search) {
				$match = '{'.$match.'}';
				$this->_documentXML = preg_replace($match, $replace, $this->_documentXML, $limit);	
				if ($limit == 1) {
					break;
				}			
			}
		}
	}

    /**
     * Returns array of all variables in template
     */
    public function getVariables()
    {
        preg_match_all('/\$\{(.*?)}/i', $this->_documentXML, $matches);
        return $matches[1];
    }

    /**
     * Save Template
     *
     * @param string $strFilename
     */
    public function save($strFilename)
    {
        if (file_exists($strFilename)) {
            unlink($strFilename);
        }

        $this->_objZip->addFromString('word/document.xml', $this->_documentXML);

        // Close zip file
        if ($this->_objZip->close() === false) {
            throw new Exception('Could not close zip file.');
        }

        rename($this->_tempFileName, $strFilename);
    }
}